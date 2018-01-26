<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\IntegralForm;
use yii\swiftmailer\Message;

class IntegralController extends Controller
{
    
    /**
     * 驾驶员违章
     * @return void|string
     */
    public function  actionIndex()
    {
        $this->layout = false;
        
        $model = new IntegralForm();
        
        $result = Yii::$app->request->post();
        if($result)
        {
            $illegal = $result['IntegralForm'];
            $JSZH = $illegal['jszh'];
            $DABH = $illegal['DABH'];
            
            $url = Yii::$app->params['sdjtaqapi']."cxqlwebservice/SdJszjfService?USERNAME=".\Yii::$app->params['sdjtaqapiuser']."&PASSWORD=".\Yii::$app->params['sdjtaqapipass']."&JSZH={$JSZH}&DABH={$DABH}";
            
            $ch = curl_init($url) ;  
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回  
            curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回  
            $output = curl_exec($ch);
//             var_dump($output);die;
            curl_close ( $ch );
            $res = json_decode($output);
//             var_dump($res->status);die;
            $status = $res->status;
//             echo $status;die;
            $info = '';
            
            /**
             * 如果status!=0(暂无数据)
             */
            if ($res->status!=0)
            {
                switch ($status)
                {
                    case '2004'://驾驶证号码错误
                        echo "<script>alert('驾驶证号码错误')</script>";
                        return  $this->render('index',['model'=>$model]);
                        break;
                    case '2003'://档案编号错误
                       echo "<script>alert('档案编号错误')</script>";
                       return  $this->render('index',['model'=>$model]);
                        break;
                    default:
                        return $this->render('error',['info'=>$info]);
                        break;
                }return;
                return $this->render('error',['info'=>$info]);
            }else
            $info = $res->jsz;
            return $this->render('_form',['info'=>$info]);
        }
        
        return  $this->render('index',['model'=>$model]);
        
    }
}

?>
