<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\WechatPicmsg */

$this->title = Yii::t('app', 'Create Wechat Picmsg');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Wechat Picmsgs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wechat-picmsg-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
