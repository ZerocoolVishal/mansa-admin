<?php

namespace app\controllers;

use app\components\UserIdentity;
use app\helpers\AppHelpers;
use app\helpers\SmsHelper;
use app\models\Appointments;
use app\models\Blogs;
use app\models\Doctors;
use app\models\DoctorsSearch;
use app\models\Faq;
use app\models\Pages;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{

    public $layout = 'main-website';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['dashboard/index']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login(UserIdentity::USER_ADMIN)) {
            return $this->redirect(['dashboard/index']);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Doctors about page.
     *
     * @return string
     */
    public function actionDoctors()
    {
        $request = Yii::$app->request->queryParams;

        $request['DoctorsSearch']['is_active'] = 1;

        $searchModel = new DoctorsSearch();
        $dataProvider = $searchModel->search($request);

        return $this->render('doctors', ['model' => $dataProvider]);
    }

    /**
     * Doctor Details about page.
     *
     * @return string
     */
    public function actionDoctorDetails($id)
    {
        $model = Doctors::findOne($id);
        if($model) {
            return $this->render('doctor-details', ['model' => $model]);
        }
    }

    /**
     * Blogs about page.
     *
     * @return string
     */
    public function actionBlogs()
    {
        $blogs = Blogs::findAll(['is_deleted' => 0, 'is_active' => 1]);
        return $this->render('blogs', ['blogs' => $blogs]);
    }

    /**
     * Blogs about page.
     *
     * @return string
     */
    public function actionBlogView($id)
    {
        $blog = Blogs::findOne($id);
        return $this->render('blog-view', ['model' => $blog]);
    }

    /**
     * Appointment Booking page.
     *
     * @return string
     */
    public function actionBookAppointment($doctor_id = null)
    {
        $model = new Appointments();

        if($doctor_id != null) {
            $model->doctor_id = $doctor_id;
        }

        if ($model->load(Yii::$app->request->post())) {

            $model->appointment_no = AppHelpers::generateAppointmentNo();
            $model->status = Appointments::NOT_CONFIRMED;
            $model->email_code = Yii::$app->security->generateRandomString(10);
            //$model->is_email_verified = 1;
            $model->created_at = date('Y-m-d h:i:s');

            if($model->doctor_timing_id) {
                $model->date = $model->doctorTiming->start_time;
            }

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Please confirm your email or Phone to send appoint request successfully');

                $message = "Please verify by going to " . \yii\helpers\Url::to(['site/confirm-email', 'key' => $model->email_code], true);
                \app\helpers\SmsHelper::sendSms($model->phone, $message);

                $email = Yii::$app->params['senderEmail'];
                Yii::$app->mailer->compose('email-confirmation', ['appointment' => $model])
                    ->setFrom([$email => 'Mannsparsh Neuropsychiatric Center and Nursing Home'])
                    ->setTo($model->email)
                    ->setSubject('Please verify your email')
                    ->send();

                return $this->refresh();
            }
        }

        return $this->render('book-appointment', ['model' => $model]);
    }

    /**
     * Email confirmation
     *
     * @return string
     */
    public function actionConfirmEmail($key)
    {
        $status = false;
        $appointment = Appointments::findOne(['email_code' => $key]);
        if($appointment) {
            $appointment->email_code = null;
            $appointment->is_email_verified = 1;
            if($appointment->save()) {
                $status = true;
            }
        }
        return $this->render('confirm-email', ['status' => $status, 'appointment' => $appointment]);
    }

    /**
     * Contact us page
     *
     * @return string
     */
    public function actionContactUs() {

        $model = new \app\models\ContactUs();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Your message has been send successfully');
            return $this->refresh();
        }

        return $this->render('contact-us', ['model' => $model]);
    }

    /**
     * Faq page
     *
     * @return string
     */
    public function actionFaq() {

        $model = Faq::find()->all();

        return $this->render('faq', ['model' => $model]);
    }

    /**
     * About us page
     *
     * @return string
     */
    public function actionAboutUs() {

        return $this->render('about-us');
    }

    /**
     * Pages render page
     *
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionPage($id) {

        $model = Pages::findOne($id);

        if($model) {
            return $this->render('page', ['model' => $model]);
        }

        throw new NotFoundHttpException('Page not found');
    }

    public function actionTestEmail()
    {
        $email = Yii::$app->params['senderEmail'];
        Yii::$app->mailer->compose()
            ->setFrom([$email => 'Mannsparsh Neuropsychiatric Center and Nursing Home'])
            ->setTo('vishalbhosle83@gmail.com')
            ->setSubject('Hello, Vishal')
            ->setTextBody('Hello')
            ->setHtmlBody('Hello')
            ->send();
    }

    public function actionEmail($id) {
        return $this->renderPartial('../../mail/layouts/html', [
            'content' => $this->renderPartial("../../mail/$id", [
                'appointment' => Appointments::findOne(1)
            ]),
        ]);
    }

    public function actionTestApp() {
//        $model = Appointments::findOne(3);
//        echo "<pre>";
//        print_r(SmsHelper::sendAppointmentSMS($model));
//        echo "</pre>";
    }
}
