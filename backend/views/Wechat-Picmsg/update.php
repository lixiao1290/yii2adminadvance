<?php

use yii\helpers\Html;
use callmez\wechat\widgets\PagePanel;
/* @var $this yii\web\View */
/* @var $model backend\models\WechatPicmsg */
use callmez\wechat\widgets\ActiveForm;
use yii\helpers\Url;
$this->title = '修改图文信息 '  ;
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
 
    <?= $form->field($model, 'title[]')->textInput(['maxlength' => true,'value'=>$row->title]) ?>
	<?=$form->field($model,'id[]')->hiddenInput(['value'=>$row->id])->label(false); ?>
    <?/*=  $form->field($model, 'isbig[]')->listBox(['1'=>'是' ],['size'=>'0'])  */ ?>
	
	<?= $form->field($model, 'image[]')->fileInput(['maxlength' => true,'value'=>'图片','onchange'=>'javascript:setImagePreview(this)']) ?>
	<div class='form-group'>
	<div class="col-sm-6 column"  style="margin: 0 auto;">
	<?=Html::img(Url::base(true).$row->image,array('height'=>'76','width'=>'104','style'=>'display:block;margin:0 auto;')); ?>
	 </div>
	 </div>
	 <?= $form->field($model, 'link[]')->textInput(['maxlength' => true,'value'=>$row->link]) ?>
	 <hr>
	 <?php } ?>
	  
	<div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <?= Html::submitButton($model->isNewRecord ? '修改图文回复' : '修改回复规则', [
                'class' => 'btn btn-block ' . ( 'btn-success'  )
            ]) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<script>
function setImagePreview(f) {
	var img=$(f).parents(".form-group").next(".form-group").find("img")[0];
	//console.log(img);return;
        var docObj=f;
 
        var imgObjPreview=img;
                if(docObj.files &&    docObj.files[0]){
                        //火狐下，直接设img属性
                        imgObjPreview.style.display = 'block';
                        imgObjPreview.style.width = '104px';
                        imgObjPreview.style.height = '76px';                    
                        //imgObjPreview.src = docObj.files[0].getAsDataURL();

      //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式  
      imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);

                }else{
                        //IE下，使用滤镜
                        docObj.select();
                        var imgSrc = document.selection.createRange().text;
                        var localImagId = img.parents(".form-group");
                        //必须设置初始大小
                        localImagId.style.width = "104px";
                        localImagId.style.height = "76px";
                        //图片异常的捕捉，防止用户修改后缀来伪造图片
try{
                                localImagId.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
                                localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
                        }catch(e){
                                alert("您上传的图片格式不正确，请重新选择!");
                                return false;
                        }
                        imgObjPreview.style.display = 'none';
                        document.selection.empty();
                }
                return true;
        }
</script>
<?php PagePanel::end() ?>

