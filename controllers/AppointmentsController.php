<?php

namespace app\controllers;

use app\components\UserIdentity;
use app\helpers\AppHelpers;
use app\helpers\SmsHelper;
use app\models\Doctors;
use app\models\DoctorTiming;
use Yii;
use app\models\Appointments;
use app\models\AppointmentsSearch;
use yii\filters\AccessControl;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AppointmentsController implements the CRUD actions for Appointments model.
 */
class AppointmentsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => UserIdentity::getUserActions(Yii::$app->controller->id),
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Appointments models.
     * @return mixed
     */
    public function actionIndex()
    {
        $request = Yii::$app->request->queryParams;

        $request['AppointmentsSearch']['is_email_verified'] = 1;

        $searchModel = new AppointmentsSearch();
        $dataProvider = $searchModel->search($request);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Appointments model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Appointments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Appointments();
        $model->appointment_no = AppHelpers::generateAppointmentNo();
        $model->created_at = date('Y-m-d h:i:s');
        $model->is_email_verified = 1;

        if ($model->load(Yii::$app->request->post())) {

//            echo "<pre>";
//            print_r($model);
//            echo "</pre>";
//            exit;

            if($model->doctor_timing_id) {
                $model->date = $model->doctorTiming->start_time;
            }

            if($model->save()) {

                if ($model->status == 1) {

                    if($model->doctor_timing_id) {
                        $doctorTiming = DoctorTiming::findOne($model->doctor_timing_id);
                        $doctorTiming->is_booked = DoctorTiming::BOOKED;
                        $doctorTiming->save(false);
                    }

                    $email = Yii::$app->params['senderEmail'];
                    if($model->status == Appointments::CONFIRMED) {
                        Yii::$app->mailer->compose('appointment', ['appointment' => $model])
                            ->setFrom([$email => 'Mannsparsh Neuropsychiatric Center and Nursing Home'])
                            ->setTo($model->email)
                            ->setSubject('Your appointment is confirmed')
                            ->send();

                        SmsHelper::sendAppointmentSMS($model);
                    }
                }

                Yii::$app->session->setFlash('success', 'Appointment booked successfully');

                return $this->redirect(['view', 'id' => $model->appointment_id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Appointments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->appointment_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Appointments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Appointments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Appointments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Appointments::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionChangeStatus()
    {

        \Yii::$app->response->format = yii\web\Response::FORMAT_JSON;

        $id = Yii::$app->request->post('id');

        $model = $this->findModel($id);
        $model->status = ($model->status == 0) ? 1 : 0;

        if($model->doctor_timing_id) {
            $model->date = $model->doctorTiming->start_time;
        }

        if($model->save()) {

            $email = Yii::$app->params['senderEmail'];

            if($model->status == 1) {

                if($model->doctor_timing_id) {
                    $doctorTiming = DoctorTiming::findOne($model->doctor_timing_id);
                    $doctorTiming->is_booked = DoctorTiming::BOOKED;
                    $doctorTiming->save(false);
                }

                Yii::$app->mailer->compose('appointment', ['appointment' => $model])
                    ->setFrom([$email => 'Mannsparsh Neuropsychiatric Center and Nursing Home'])
                    ->setTo($model->email)
                    ->setSubject('Your appointment is confirmed')
                    ->send();

                SmsHelper::sendAppointmentSMS($model);
            }

            elseif ($model->status == 0) {

                if($model->doctor_timing_id) {
                    $doctorTiming = DoctorTiming::findOne($model->doctor_timing_id);
                    $doctorTiming->is_booked = DoctorTiming::AVAILABLE;
                    $doctorTiming->save(false);
                }

                Yii::$app->mailer->compose('appointment-cancelled', ['appointment' => $model])
                    ->setFrom([$email => 'Mannsparsh Neuropsychiatric Center and Nursing Home'])
                    ->setTo($model->email)
                    ->setSubject('Your appointment is cancelled')
                    ->send();

                SmsHelper::sendAppointmentSMS($model);
            }

            return [
                'status' => '1',
                'message' => 'Ok',
            ];
        }
        else {
            return [
                'status' => '0',
                'message' => 'Fail',
            ];
        }
    }

    public function actionGetDoctorTiming($doctor_id, $date)
    {
        $doctorTimingList = AppHelpers::getDoctorTimingList($doctor_id, $date, DoctorTiming::AVAILABLE);
        return Html::renderSelectOptions('', $doctorTimingList);
    }
}
