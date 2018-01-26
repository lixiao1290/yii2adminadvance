<?php

namespace mdm\admin\controllers;

use Yii;
use mdm\admin\models\MyAuthItem;
use mdm\admin\models\MyAuthItemsSearchModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * MyAuthItemsController implements the CRUD actions for MyAuthItem model.
 */
class MyAuthItemsController extends Controller
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

    /**
     * Lists all MyAuthItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MyAuthItemsSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if (Yii::$app->request->post('hasEditable')) {
            // instantiate your book model for saving
            $bookId = Yii::$app->request->post('editableKey');
            $model = MyAuthItem::findOne($bookId);
        
            // store a default json response as desired by editable
            $out = Json::encode(['output'=>'', 'message'=>'']);
        
            // fetch the first entry in posted data (there should only be one entry
            // anyway in this array for an editable submission)
            // - $posted is the posted data for Book without any indexes
            // - $post is the converted array for single model validation
            $posted = current($_POST['MyAuthItem']);
            $post = ['MyAuthItem' => $posted];
        
            // load model like any single model validation
            if ($model->load($post)) {
                // can save model or do something before saving model
                $model->save();
        
                // custom output to return to be displayed as the editable grid cell
                // data. Normally this is empty - whereby whatever value is edited by
                // in the input by user is updated automatically.
                $output = '';
        
                // specific use case where you need to validate a specific
                // editable column posted when you have more than one
                // EditableColumn in the grid view. We evaluate here a
                // check to see if buy_amount was posted for the Book model
                if (isset($posted['buy_amount'])) {
                    $output = Yii::$app->formatter->asDecimal($model->buy_amount, 2);
                }
        
                // similarly you can check if the name attribute was posted as well
                // if (isset($posted['name'])) {
                // $output = ''; // process as you need
                // }
                $out = Json::encode(['output'=>$output, 'message'=>'']);
            }
            // return ajax json encoded response and exit
            echo $out;
            return;
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MyAuthItem model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MyAuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MyAuthItem();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MyAuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    public function actionUpdatea()
    {
        try {
            $model = $this->findModel($_REQUEST['editableKey']);
            $model->description=$_REQUEST['MyAuthItem'][$_REQUEST['editableIndex']]['description'];
            $model->save();
          echo  json_encode(array('output'=>$_REQUEST['MyAuthItem'][$_REQUEST['editableIndex']]['description']));
        } catch (Exception $e) {
          echo    json_encode(array('output'=>$e->getMessage()));
        }
        
    }
    /**
     * Deletes an existing MyAuthItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MyAuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return MyAuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MyAuthItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
