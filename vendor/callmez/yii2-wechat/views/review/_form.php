<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use callmez\wechat\models\ReviewRule;
use callmez\wechat\widgets\ActiveForm;
?>

<div class="reply-rule-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal'
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['maxlength' => true]) ?>

	<?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>
	<div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <?= Html::submitButton($model->isNewRecord ? '发布文章' : '修改回复规则', [
                'class' => 'btn btn-block ' . ($model->isNewRecord ? 'btn-success' : 'btn-primary')
            ]) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<script id="ruleKeywordTemplate" type="text/html">
</script>
<?php
$this->registerJs(
    <<<EOF
var ruleKeywordNum = 100; // 新建的规则从第100个递增,和已有的规则不冲突(前提是已有的规则不能超过100个)
$(document)
    .on('click', '#addRuleKeyword', function(){
        $(this).before($('#ruleKeywordTemplate').html().replace(/\[\]\[/g, '[' + ruleKeywordNum + ']['));
        ruleKeywordNum++;
    })
    .on('click', '.panel .close', function() {
        if (confirm('确认删除这条关键字么')) {
            $(this).closest('.panel').remove();
        }
    });
EOF
);
