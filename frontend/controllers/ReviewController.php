<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\ReviewForm;
class ReviewController extends Controller
{
    
    public function  actionIndex()
    {
        $this->layout = false;
        
        
        $model = new ReviewForm();
        
        $result = Yii::$app->request->post();
        if($result)
        {
            
            
        }
        
        return  $this->render('index',['model'=>$model]);
        
    }
}

?>