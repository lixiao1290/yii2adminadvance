<?php
/**
* Created by ZendStudio.
* 99eou.com xx文件
* ==============================================
* 版权所有 2013-2016  blog.99eou.com
* ----------------------------------------------
* 这不是一个自由软件，未经授权不许任何使用和传播。
* ==============================================
* @date: 2016年8月4日
* @author: kyuuchou
* @email: qiuchao@uniauto.com
* @version:
*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\assets\AppAsset;
use yii\grid\GridView;
use callmez\wechat\widgets\PagePanel;
use frontend\controllers\SuperbController;
use yii\helpers\Url;
AppAsset::register($this);
$this->beginPage();

$this->title = '文章列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<!doctype html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>车微联</title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="Keywords" content="车微联，微联车生活" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta content="telephone=no" name="format-detection" />
<link href="img/touch-icon.png" rel="apple-touch-icon-precomposed" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta content="telephone=no" name="format-detection" />
<meta http-equiv="description" content="畅行齐鲁 公共平台">
<?php $this->head();?>
</head>
<?php PagePanel::begin(['options' => ['class' => 'superb-index']]) ?>
<body>
<?php $this->beginBody()?>
<!--<form name="form1" id="form1" method="post" action="../JdcBindService">-->
<?php $form = ActiveForm::begin();?>
  <input type="hidden" id="signid" name="signid" value="null" />
  <div class="container">
    <div class="row">
      <div class="col-xs-12" >
        <div class="row">
          <!--<div class="col-xs-6" style="padding:0"><a href="#" class="tabs-nav" id="nav_row2">驾驶人违法</a></div>-->
        </div>
      </div>
    </div>
    <div class="row" style="margin-top:20px;id="row1">
      <div class="col-xs-12">
        <div class="form-group">
        </div>
        <div class="form-group">
        <label class="op-lb">标题</label>
        <?php echo $model->title?>
          <!--<label class="text-muted">车牌号码</label>
          <input class="form-control"  name="hphm"  id="hphm" type="text" placeholder="" autofocus required="" tabindex="1"  value="鲁"/>-->
        </div>
        <div class="form-group">
          <!--<label class="text-muted">车架号后六位</label>
          <input class="form-control" type="text" name="clsbdh" id="clsbdh" placeholder="请输入车架号后六位" autofocus required="" tabindex="2"/>-->
        </div>
        <div class="btn_div">
          <button class="btn_sub"  id="submitButton" name="submitButton" type="submit">查询</button>
        </div>
      </div>
    </div>
  </div>
  <?php ActiveForm::end();?>
<!--  </form>-->

<div class="foot">
	<a class="btn-download" href="http://www.baidu.com">下载车微联APP</a>
</div>
<?php $this->endBody()?>
<script>
	$(document).ready(function(e) {
        $("#jszh").focus();
		
		$('.tabs-nav').click(function(e) {
			$('.tabs-nav').removeClass('active');
			$(this).addClass('active');
			var nid=$(this).attr("id");
			if(nid==="nav_row1")
			{
				$("#row1").show();
				$("#row2").hide();
				}
			else
			{
				$("#row1").hide();
				$("#row2").show();
				}
        });
		
		
    });
</script>
</body>
</html>
<?php $this->endPage()?>