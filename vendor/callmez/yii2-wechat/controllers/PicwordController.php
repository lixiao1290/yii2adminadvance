<?php
namespace callmez\wechat\controllers;

use yii\helpers\Url;
use callmez\wechat\components\ProcessController;
use callmez\wechat\components\BaseController;
use backend\models\WechatPicmsg;

class PicwordController extends ProcessController
{

    public function hello()
    {
        echo 'hello world';
    }

    /**
     * 图文消息
     * 
     * @return string
     */
    public function index()
    {
        // return 'he';
        $list = WechatPicmsg::find()->select([
            'title',
            'image',
            'link',
            'isbig',
            'createtime'
        ])
            ->orderBy('createtime,isbig desc')
            ->limit('3')
            ->all();
        // var_dump('<pre>',$list);exit;
        
        $count = count($list);
        $newsTplHead = "<xml>
                <ToUserName><![CDATA[%s]]></ToUserName>
                <FromUserName><![CDATA[%s]]></FromUserName>
                <CreateTime>%s</CreateTime>
                <MsgType><![CDATA[news]]></MsgType>
                <ArticleCount>%s</ArticleCount>
                <Articles>";
        $newsTplBody = "<item>
                <Title><![CDATA[%s]]></Title>
                <Description><![CDATA[%s]]></Description>
                <PicUrl><![CDATA[%s]]></PicUrl>
                <Url><![CDATA[%s]]></Url>
                </item>";
        $newsTplFoot = "</Articles>
                </xml>";
        
        @$head = sprintf($newsTplHead, $ToUserName, $FromUserName, $_SERVER['REQUEST_TIME'], $count);
        $body = '';
        foreach ($list as $row) {
            $body .= sprintf($newsTplBody, $row->title, '图文回复', Url::base(true) .'/../'.$row->image, $row->link);
        }
        
        return $head . $body . $newsTplFoot;
    }
}

