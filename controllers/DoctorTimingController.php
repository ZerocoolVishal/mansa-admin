<?php

namespace app\controllers;

use app\components\UserIdentity;
use app\models\DoctorSchedule;
use DateInterval;
use DatePeriod;
use DateTime;
use Yii;
use app\models\DoctorTiming;
use app\models\DoctorTimingSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;

/**
 * DoctorTimingController implements the CRUD actions for DoctorTiming model.
 */
class DoctorTimingController extends Controller
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
     * Lists all DoctorTiming models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DoctorTimingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DoctorTiming model.
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
     * Creates a new DoctorTiming model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DoctorTiming();
        $model->scenario = 'create';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Doctor timing added successfully');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Doctor Schedule model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateSchedule()
    {
        $model = new DoctorSchedule();

        if ($model->load(Yii::$app->request->post())) {

            $begin = new DateTime($model->start_date);
            $end = new DateTime(date('y-m-d', strtotime($model->end_date . ' +1 day')));

            $interval = DateInterval::createFromDateString('1 day');
            $period = new DatePeriod($begin, $interval, $end);

            foreach ($period as $dt) {

                $date = $dt->format("Y-m-d");

                foreach ($model->start_time as $key => $start_rime) {
                    $end_time = $model->end_time[$key];
                    $doctorTimingModel = new DoctorTiming();
                    $doctorTimingModel->scenario = 'create';
                    $doctorTimingModel->doctor_id = $model->doctor_id;
                    $doctorTimingModel->date = $date;
                    $doctorTimingModel->start_time = $start_rime;
                    $doctorTimingModel->end_time = $end_time;
                    $doctorTimingModel->save();
                }
            }

            Yii::$app->session->setFlash('success', 'Doctor schedule created successfully');
            return $this->redirect(['index']);
        }

        return $this->render('create-schedule', [
            'model' => $model,
        ]);
    }

    public function actionGetScheduleTimeAjax()
    {
        $model = new DoctorSchedule();
        $form = ActiveForm::begin();

        return $this->renderAjax('create-schedule-timing', [
            'model' => $model,
            'form' => $form,
        ]);
    }

    /**
     * Updates an existing DoctorTiming model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'update';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Doctor timing updated successfully');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DoctorTiming model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->is_deleted = 1;
        $model->save();

        Yii::$app->session->setFlash('success', 'Doctor timing deleted successfully');


        return $this->redirect(['index']);
    }

    /**
     * Finds the DoctorTiming model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DoctorTiming the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DoctorTiming::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
