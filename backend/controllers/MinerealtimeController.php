<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\MinerealtimeForm;
class MinerealtimeController extends Controller
{
    
    public function  actionIndex()
    {
        $this->layout = false;
        
        $model = new MinerealtimeForm();
        $model->hpzl = '02';
        
        $result = Yii::$app->request->post();
        if($result)
        {
            $illegal = $result['MinerealtimeForm'];
            $hphm = $illegal['hphm'];
            $hpzl = $illegal['hpzl'];
            $clsbdh = $illegal['clsbdh'];
            
            $url = Yii::$app->params['sdjtaqapi']."cxqlwebservice/SdWzcxService?USERNAME=".\Yii::$app->params['sdjtaqapiuser']."&PASSWORD=".\Yii::$app->params['sdjtaqapipass']."&HPHM={$hphm}&HPZL={$hpzl}&CLSBDH={$clsbdh}";

          
            $ch = curl_init($url) ;  
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回  
            curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回  
            $output = curl_exec($ch);
            
            curl_close ( $ch );
            $res = json_decode($output);
            var_dump($res);exit;
        }
        
        return  $this->render('index',['model'=>$model]);
        
    }
}

?>