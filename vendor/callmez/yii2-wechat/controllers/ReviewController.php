<?php

namespace callmez\wechat\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use callmez\wechat\models\ReviewRule;
use callmez\wechat\models\ReplyRuleSearch;
use callmez\wechat\models\ReplyRuleKeyword;
use callmez\wechat\components\AdminController;
use callmez\wechat\models\ReviewRuleSearch;

/**
 * 模块回复规则控制
 * @package callmez\wechat\controllers
 */
class ReviewController extends AdminController
{
    /**
     * 扩展模块回复列表
     * @return mixed
     */
    public function actionIndex()
    {
        $mid = 1;
        $searchModel = new ReviewRuleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'id' => $mid,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new ReplyRule model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ReviewRule();
        $model->created_at=date('Y-m-d H:i:s');

        if(Yii::$app->request->post())
        {
            $post = Yii::$app->request->post();
//             var_dump(Yii::$app->request->post());die;
            if($model->load($post) && $model->save())
            {
                return $this->flash('添加成功!', 'success');
//                 return $this->redirect(['index']);
            }else{
                return $this->flash('添加失败!', 'error');
//                 return $this->render('create',[
//                     'model' =>$model,
//                 ]);
            }
        }else{
            return $this->render('create',[
                'model'=>$model,
            ]);
        }
            
    }

    /**
     * Updates an existing ReplyRule model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $ruleKeyword = new ReplyRuleKeyword();
        $ruleKeywords = $model->keywords;
        if ($model->load(Yii::$app->request->post())) {
            $model->wid = $this->getWechat()->id;
            if ($this->save($model, $ruleKeyword, $ruleKeywords)) {
                return $this->flash('修改成功!', 'success', ['update', 'id' => $model->id]);
            }
        }
        return $this->render('update', [
            'model' => $model,
            'ruleKeyword' => $ruleKeyword,
            'ruleKeywords' => $ruleKeywords
        ]);
    }

    /**
     * Deletes an existing ReplyRule model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $mid = $model->id;
        $model->delete();

        return $this->redirect(['index', 'id' => $mid]);
    }

    /**
     * 保存内容
     * @param $rule
     * @param $keyword
     * @param array $keywords
     * @return bool
     */
    protected function savebf($rule, $keyword, $keywords = [])
    {
        if (!$rule->save()) {
            return false;
        }
        $_keywords = ArrayHelper::index($keywords, 'id');
        $keywords = [];
        $valid = true;
        foreach (Yii::$app->request->post($keyword->formName(), []) as $k => $data) {
            if (!empty($data['id']) && $_keywords[$data['id']]) {
                $_keyword = $_keywords[$data['id']];
                unset($_keywords[$data['id']]);
            } else {
                $_keyword = clone $keyword;
            }
            unset($data['id']);
            $keywords[] = $_keyword;
            $_keyword->setAttributes(array_merge($data, [
                'rid' => $rule->id
            ]));
            $valid = $valid && $_keyword->save();
        }
        !empty($_keywords) && ReplyRuleKeyword::deleteAll(['id' => array_keys($_keywords)]); // 无更新的则删除
        return $valid;
    }

    /**
     * Finds the ReplyRule model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ReplyRule the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ReviewRule::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
