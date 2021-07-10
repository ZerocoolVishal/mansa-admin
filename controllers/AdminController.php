<?php

namespace app\controllers;

use app\components\UserIdentity;
use app\models\AuthAssignment;
use app\models\AuthItem;
use app\models\AuthModule;
use Yii;
use app\models\Admin;
use app\models\AdminSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdminController implements the CRUD actions for Admin model.
 */
class AdminController extends Controller
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
     * Lists all Admin models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdminSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Admin model.
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
     * Creates a new Admin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Admin();
        $model->scenario = 'create';

        if ($model->load(Yii::$app->request->post())) {

            $model->password = Yii::$app->security->generatePasswordHash($model->password);

            if($model->save()) {

                foreach ($model->permissions as $key => $value) {
                    if($value) {
                        $authAssignment = new AuthAssignment();
                        $authAssignment->auth_item_id = $key;
                        $authAssignment->user_id = $model->admin_id;
                        $authAssignment->user_type = 'A';
                        $authAssignment->save();
                    }
                }

                Yii::$app->session->setFlash('success', 'Admin created successfully');
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Admin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $old_password = $model->password;
        $model->password = null;

        if ($model->load(Yii::$app->request->post())) {

            if($model->password != null) {
                $model->password = Yii::$app->security->generatePasswordHash($model->password);
            }
            else {
                $model->password = $old_password;
            }

            if($model->save()) {

                AuthAssignment::deleteAll(['user_id' => $model->admin_id, 'user_type' => 'A']);

                foreach ($model->permissions as $key => $value) {
                    if($value) {
                        $authAssignment = new AuthAssignment();
                        $authAssignment->auth_item_id = $key;
                        $authAssignment->user_id = $model->admin_id;
                        $authAssignment->user_type = 'A';
                        $authAssignment->save();
                    }
                }

                Yii::$app->session->setFlash('success', 'Admin updated successfully');
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Admin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->is_deleted = 1;
        if($model->save(false)) {
            Yii::$app->session->setFlash('success', 'Admin deleted successfully');
        }

        return $this->redirect(['index']);
    }

    public function actionChangeStatus()
    {

        \Yii::$app->response->format = yii\web\Response::FORMAT_JSON;

        $id = Yii::$app->request->post('id');

        $model = $this->findModel($id);
        $model->is_active = ($model->is_active == 0) ? 1 : 0;
        if($model->save(false)) {
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

    /**
     * Finds the Admin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Admin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Admin::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionAuthCreate2($override = 0) {

        echo "<b>Auth Create 2.1</b><br>";

        $list = [
//            'admin' => [
//                'index' => "View Admins",
//                'view'  => 'View Details',
//                'create'  => 'Create',
//                'update'  => 'Update',
//                'delete'  => 'Delete'
//            ],
//            'appointments' => [
//                'index' => "View Appointments",
//                'view'  => 'View Details',
//                'create'  => 'Create',
//                'update'  => 'Update',
//            ],
//            'contact-us' => [
//                'index' => "View Messages",
//            ],
//            'blogs' => [
//                'index' => "View Blogs",
//                'view'  => 'View Details',
//                'create'  => 'Create',
//                'update'  => 'Update',
//                'delete'  => 'Delete'
//            ],
//            'blog-authors' => [
//                'index' => "View Authors",
//                'view'  => 'View Details',
//                'create'  => 'Create',
//                'update'  => 'Update',
//                'delete'  => 'Delete'
//            ],
//            'blog-categories' => [
//                'index' => "View Categories",
//                'view'  => 'View Details',
//                'create'  => 'Create',
//                'update'  => 'Update',
//                'delete'  => 'Delete'
//            ],
//            'doctors' => [
//                'index' => "View Doctors",
//                'view'  => 'View Details',
//                'create'  => 'Create',
//                'update'  => 'Update',
//                'delete'  => 'Delete'
//            ],
//            'testimonies' => [
//                'index' => "View Testimonies",
//                'view'  => 'View Details',
//                'create'  => 'Create',
//                'update'  => 'Update',
//                'delete'  => 'Delete'
//            ],
//            'faq' => [
//                'index' => "View FAQs",
//                'view'  => 'View Details',
//                'create'  => 'Create',
//                'update'  => 'Update',
//                'delete'  => 'Delete'
//            ],
//            'pages' => [
//                'index' => "View Pages",
//                'view'  => 'View Details',
//                'create'  => 'Create',
//                'update'  => 'Update',
//                'delete'  => 'Delete'
//            ],
//            'settings' => [
//                'sms' => "SMS Module",
//            ],
            'doctor-timing' => [
                'index' => "View Timing",
                'view'  => 'View Details',
                'create'  => 'Create',
                'update'  => 'Update',
                'delete'  => 'Delete'
            ]
        ];
        $rule_type = 'A';

        foreach ($list as $item => $module_items) {

            $old_auth_modules = \app\models\AuthModule::find()
                ->leftJoin(\app\models\AuthItem::tableName(), 'tbl_auth_module.auth_module_id = tbl_auth_item.auth_module_id')
                ->where(['tbl_auth_module.module_url' => '/'.$item])
                ->andWhere(['tbl_auth_item.rule_type' => $rule_type])
                ->all();

            if(!empty($old_auth_modules)) {
                if($override == 0) {
                    echo "<span style='color: #a5a500'>Skipped</span>: <b>$item</b> Auth Module already exists (<i>Use override = 1 to create</i>)<br>";
                    continue;
                }

                foreach ($old_auth_modules as $old_auth_module) {
                    $old_auth_module->is_active = 0;
                    $old_auth_module->save();
                    if(!empty($old_auth_module->authItems)) {
                        foreach ($old_auth_module->authItems as $authItems) {
                            $authItems->is_active = 0;
                            $authItems->save();
                        }
                    }
                }
            }

            $auth_module = new AuthModule();

            if(isset($module_items['title'])) {
                $auth_module->module_name = $module_items['title'];
            }
            else {
                $auth_module->module_name = ucfirst($item);
            }
            $auth_module->module_url = '/'.$item;

            if($auth_module->save()) {

                foreach ($module_items as $key => $module_item) {

                    if($key == 'title') {
                        continue;
                    }

                    $auth_item = new AuthItem();
                    $auth_item->item_name = $module_item;
                    $auth_item->item_url = '/'.$key;
                    $auth_item->auth_module_id = $auth_module->auth_module_id;
                    $auth_item->rule_type = $rule_type;

                    if($auth_item->save()) {
                        echo "<span style='color: green'>Success</span>: $module_item <br>";
                    }
                    else {
                        echo "<span style='color: red'>Failed</span>: $module_item <br>";
                        echo "<pre>";
                        print_r($auth_item->getErrors());
                        echo "</pre>";
                    }
                }
            }
        }
    }

}
