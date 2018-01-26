<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;


class TestController extends Controller
{
    public $modelClass = '';
    
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionValid()
    {
        var_dump(Yii::$app->wechat);exit;
        $echoStr = $_GET["echostr"];
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        //valid signature , option
        if($this->checkSignature($signature,$timestamp,$nonce)){
            echo $echoStr;
        }
    }
    
    private function checkSignature($signature,$timestamp,$nonce)
    {
        // you must define TOKEN by yourself
        $token = Yii::$app->params['wechat']['token'];
        if (!$token) {
            echo 'TOKEN is not defined!';
        } else {
            $tmpArr = array($token, $timestamp, $nonce);
            // use SORT_STRING rule
            sort($tmpArr, SORT_STRING);
            $tmpStr = implode( $tmpArr );
            $tmpStr = sha1( $tmpStr );
    
            if( $tmpStr == $signature ){
                return true;
            }else{
                return false;
            }
        }
    }
    
    
    /* 查询功能
     * HPHM 车牌号
     * HPZL 车辆类型
     * WFSJ 违章时间
     * */
    public function actionDetails()
    {
       var_dump($_POST);exit();
        $hpzl = $_POST["hpzl"];
        $hphm = $_POST["hphm"];
        $clsbdh = $_POST["clsbdh"];
       
//                 $request_url = 'http://115.28.141.134/PublicData/high/selWeiZhangInfo'.'?HPHM='.$hphm.'&HPZL='.$hpzl.'&clsbdh='.$clsbdh;
        //初始化一个curl会话
        $uri = "http://115.28.141.134/PublicData/high/selWeiZhangInfo'.'?HPHM='.$hphm.'&HPZL='.$hpzl.'&clsbdh='.$clsbdh";
        // 参数数组
        $data = array (
            'hpzl' => 'hpzl',
            'hphm' => 'hphm'
        );
    
        $ch = curl_init ();
        // print_r($ch);
        curl_setopt ( $ch, CURLOPT_URL, $uri );
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
        $return = curl_exec ( $ch );
        curl_close ( $ch );
        
        print_r($return);
        //         return $result;
    }
    
    
    
}

?>