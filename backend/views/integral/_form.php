<!doctype html>
<?php 
use yii\helpers\Html;
use backend\controllers\IllegalController;
use yii\widgets\ActiveForm;
use backend\assets\AppAsset;
AppAsset::register($this);
$this->beginPage();
?>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>车微联</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/b_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script>
	$(document).ready(function(e) {
        $("#hphm").focus();
		
		$('.tabs-nav').click(function(e) {
			$('.tabs-nav').removeClass('active');
			$(this).addClass('active');
			$('.list-row').hide();
			var nid=$(this).attr("data-block");
			$('#'+nid).show();
        });
    });
</script>
<style>
	body{
		background:#f2f2f2;
	}
</style>
</head>

<body>
<form name="form1" id="form1" method="post" action="../JdcBindService">
  <input type="hidden" id="signid" name="signid" value="null" />
  <div class="container" style="margin-bottom:40px;">
  
    <div class="row list-row"	 id="row1">
      <div class="col-xs-12">
      <?php foreach ($info as $k=>$v):?>
        <div class="form-cells" style="padding-left: 150px>
          <div class="view_tab_list" ">    
              <div><label>驾驶证号：</label><div class="info"><?= $v->JSZH?></div></div>
              <div><label>档案编号：</label><div class="info"><?= $v->DABH ?></div></div>
              <div><label>有效期：</label><div class="info"><?= $v->YXQZ?></div></div>
              <div><label>累积计分：</label><span class="view_warn"><?= $v->LJJF ?></span>
              &nbsp;&nbsp;&nbsp;&nbsp;</div>
          </div>
<!--         <div class="icon_corner_warn"></div> -->
        </div>
        <?php endforeach;?>
    <div class="row list-row"	 id="row2" style="display:none;">
    <div class="row list-row"	 id="row3" style="display:none;">

  </div>
</form>
<div class="foot">
	<a class="btn-download" href="http://www.baidu.com">下载车微联APP</a>
</div>
</body>
</html>
