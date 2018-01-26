<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\IllegalForm;
class IllegalController extends Controller
{
    
    public function  actionIndex()
    {
        $this->layout = false;
        
        $model = new IllegalForm();
        $model->hpzl = '02';
        
        $result = Yii::$app->request->post();
        if($result)
        {
            $illegal = $result['IllegalForm'];
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
//             var_dump($res->status);die;
            $status = $res->status;
//             var_dump($status);die;
            /**
             * 判断返回状态
             * @var unknown
             */
            if ($status != 0)
            {
                switch ($status)
                {
                    case '1001':
                        echo "<script>alert('号牌号码错误');</script>";
                        return $this->render('index',['model'=>$model]);
                        break;
                    case '1002':
                        echo "<script>alert('号牌种类错误');</script>";
                        return $this->render('index',['model'=>$model]);
                        break;
                    case '1003':
                        echo "<script>alert('车辆识别代码错误');</script>";
                        return $this->render('index',['model'=>$model]);
                        break;
                    case '1004':
                        echo "<script>alert('车辆验证失败');</script>";
                        return $this->render('index',['model'=>$model]);
                        break;
                    case '1009':
                        echo "<script>alert('查询过于频繁');</script>";
                        return $this->render('index',['model'=>$model]);
                        break;
                   default:
                       break;
                }
                
            }
            
            $info = '';
            if ($res->status!=0)
            {
                return $this->render('error',['info'=>$info]);
            }
            $info = $res->desc;
//             var_dump($info);exit;
            return $this->render('_form',['info'=>$info]);
        }
        
        return  $this->render('index',['model'=>$model]);
        
    }
}

?>