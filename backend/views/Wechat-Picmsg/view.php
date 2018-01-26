<?php

use yii\helpers\Html;
use callmez\wechat\widgets\PagePanel;
/* @var $this yii\web\View */
/* @var $model backend\models\WechatPicmsg */
use callmez\wechat\widgets\ActiveForm;
use yii\helpers\Url;
$this->title = ' 图文信息 '  ;
$this->params['breadcrumbs'][] = ['label' => '图文信息', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';  
?>
<?php PagePanel::begin(['options' => ['class' => 'review-create']]) ?>

   <div class="reply-rule-form">
 
    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal'
    ]); ?>
	 
    <?php foreach ($data as $row) { ?>
 
    <?= $form->field($model, 'title[]')->textInput(['maxlength' => true,'value'=>$row->title,'readonly'=>true]) ?>
	<?=$form->field($model,'id[]')->hiddenInput(['value'=>$row->id])->label(false); ?>
    <?/*=  $form->field($model, 'isbig[]')->listBox(['1'=>'是' ],['size'=>'0'])  */ ?>
	<div class='form-group'>
	<div class="col-sm-6 column"  style="margin: 0 auto;">
	<?=Html::img(Url::base(true).''.$row->image,array('height'=>'76','width'=>'104','style'=>'display:block;margin:0 auto;')); ?>
	 </div>
	 </div>
	
	 <?= $form->field($model, 'link[]')->textInput(['maxlength' => true,'value'=>$row->link,'readonly'=>true]) ?>
	 <hr>
	 <?php } ?>
	  
	<div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <?/* = Html::submitButton($model->isNewRecord ? '发布文章' : '修改回复规则', [
                'class' => 'btn btn-block ' . ( 'btn-success'  )
            ])  */?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php PagePanel::end() ?>

