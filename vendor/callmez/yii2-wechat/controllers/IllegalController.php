<?php
namespace callmez\wechat\controllers;

use Yii;
use callmez\wechat\components\AdminController;

/**
 * 
 * 违法查询功能
 * @author MaCong
 * 2016年08月02日9:03:52
 *
 */
class IllegalController extends AdminController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    /*查询功能*/
    public function actionDetails()
    {
        $hpzl = $_POST["hpzl"];
        $hphm = $_POST["hphm"];
        $clsbdh = $_POST["clsbdh"];
        var_dump(Yii::$app->request->params);exit;
//         $request_url = 'http://115.28.141.134/PublicData/high/selWeiZhangInfo'.'?HPHM='.$hphm.'&HPZL='.$hpzl.'&clsbdh='.$clsbdh;
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