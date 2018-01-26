<?php

namespace backend\controllers;

use Yii;
use backend\models\WechatPicmsg;
use backend\models\WechatPicmsgSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\lib\UploadForm;
use callmez\wechat\components\AdminController;

/**
 * WechatPicmsgController implements the CRUD actions for WechatPicmsg model.
 */
class WechatPicmsgController extends AdminController
{
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    public $layout = NULL;
    /**
     * Lists all WechatPicmsg models.
     *图文消息列表
     * @return mixed
     */
    public function actionIndex()
    {      
        $searchModel = new WechatPicmsgSearch();
        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        //  var_dump('<pre>',$dataProvider);exit;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 图文消息详情
     * Displays a single WechatPicmsg model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = new WechatPicmsg();
           $data= WechatPicmsg::find()->select([
            'groupid','title','id',
            'image',
            'link',
            'isbig',
        ])->where('groupid=:groupid',array(':groupid'=>$id))->orderBy('isbig desc')->all() ; 
            
        // echo '<pre>';   var_dump($data);exit;
            return $this->render('view', [
                'model' => $model,
                'data'=>$data,
            ]);
        }

    /**
     * 新加图文消息。
     * Creates a new WechatPicmsg model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WechatPicmsg();
        $uploadform=new UploadForm();
        $model->setScenario('create');
        /* if($_POST) {
            var_dump($_REQUEST,$_FILES);exit;
        } */
        //$model->wechat_id=$this->getWechat()->id;
        if ($model->load(Yii::$app->request->post()) && $model->saveMsg()) {
              
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                
            ]);
        }
    }

    /**
     * 更改图文消息
     * Updates an existing WechatPicmsg model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
         $model = new WechatPicmsg();

        if ($model->load(Yii::$app->request->post()) && $model->updateMsgs()) {
            //exit($id);
            return $this->redirect(['update', 'id' => $id]);
        } else {
           $data= WechatPicmsg::find()->select([
            'groupid','title','id',
            'image',
            'link',
            'isbig',
        ])->where('groupid=:groupid',array(':groupid'=>$id))->orderBy('isbig desc')->all() ; 
            
        // echo '<pre>';   var_dump($data);exit;
            return $this->render('update', [
                'model' => $model,
                'data'=>$data,
            ]);
        }
    }

    /**
     * Deletes an existing WechatPicmsg model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id)->one();
        $model->deleteAll('groupid=:groupid',array(':groupid'=>$id));
 
        return $this->redirect(['index']);
    }

    /**
     * Finds the WechatPicmsg model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WechatPicmsg the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WechatPicmsg::find() ) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
