<?php

use yii\helpers\Html;
use callmez\wechat\widgets\PagePanel;

$this->title = '添加图文回复';
$this->params['breadcrumbs'][] = ['label' => '添加',''];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php PagePanel::begin(['options' => ['class' => 'review-create']]) ?>

    <?= $this->render('_form', [
        'model' => $model,
//         'ruleKeyword' => $ruleKeyword,
//         'ruleKeywords' => $ruleKeywords
    ]) ?>

<?php PagePanel::end() ?>
