<?php
namespace callmez\wechat\controllers;

use Yii;
use callmez\wechat\components\AdminController;

/**
 * 
 * 驾驶证积分查询功能
 * @author MaCong
 * 2016年8月2日10:00:00
 */
class IntegralController extends AdminController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    /*查询功能*/
    public function actionDetails()
    {
        echo 'Test';
        exit;
    }
}