<?php

use yii\helpers\Html;
use callmez\wechat\widgets\PagePanel;

$this->title = '发布文章';
$this->params['breadcrumbs'][] = ['label' => '发布文章',''];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php PagePanel::begin(['options' => ['class' => 'review-create']]) ?>

    <?= $this->render('_form', [
        'model' => $model,
//         'ruleKeyword' => $ruleKeyword,
//         'ruleKeywords' => $ruleKeywords
    ]) ?>

<?php PagePanel::end() ?>
