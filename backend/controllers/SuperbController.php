<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\SuperbForm;
use yii\data\ArrayDataProvider;
use yii\data\ActiveDataProvider;
use yii\base\Model;
use yii\web\User;

use source\LuLu;
use source\modules\log\models\AppFeedback;
use yii\helpers\ArrayHelper;
use yii\base\ModelEvent;
use yii\helpers\VarDumper;
use yii\data\SqlDataProvider;

class SuperbController extends Controller
{
    
    public function  actionIndex()
    {
        $this->layout = false;
        $model = new SuperbForm();
        
        $count = Yii::$app->db->createCommand('SELECT COUNT(*) FROM wechat_review')->queryScalar();
        $provider = new SqlDataProvider([
            'sql' => 'SELECT * FROM wechat_review',
            'totalCount' => $count,
            'pagination' => [
                'pageSize' => 5,
            ],
            'sort' => [
                'attributes' => [
                    'id',
                    'title',
                    'img',
                ],
            ],
        ]);
        $users = $provider->getModels();
//         var_dump($users);
        
        $info = "";
        foreach ($users as $k=>$v)
        {
            $info[$k]['title'] = $v['title'];
            $info[$k]['img'] = $v['img'];
            $info[$k]['id'] = $v['id'];
            $info[$k]['content'] = $v['content'];
//             echo $v['id'];
//             echo '<br/>';
        }
//         die;
        return $this->render('_form',['info'=>$info]);
    }
    public function actionView()
    {
        $model = $this->loadRecord();
		$this->render('view',array('model'=>$model));
    }
    
    public function loadRecord($id=null)
    {
        $id = $_GET['id']?:$id;
        if($id!=null)
        {
            return SuperbForm::find($id);
//             return SuperbForm::model()->findByPk($id);
        }
        die;
    }
    
}
?>