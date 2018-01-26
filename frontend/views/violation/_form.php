<!doctype html>
<?php 
use yii\helpers\Html;
use frontend\controllers\IllegalController;
use yii\widgets\ActiveForm;
use frontend\assets\AppAsset;
AppAsset::register($this);
$this->beginPage();
?>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>车微联_查询附近违章高发点</title>
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
  
<!--     <div class="row"> -->
<!--       <div class="col-xs-12" > -->
<!--         <div class="row"> -->
          
<!--  <div class="col-xs-4" style="padding:0"><a href="#" class="tabs-nav active" id="nav_row1" data-block="row1">全部</a></div>       </div> -->
<!--       </div> -->
<!--     </div> -->
    <!-- -->
    <div class="row list-row"	 id="row1">
      <div class="col-xs-12">
      <?php foreach ($info as $k=>$v):?>
        <div class="form-cells">
          <div class="view_tab_list">    
              <div><label>标题：</label><div class="info"><?= $v['data']['vioTitle'];?></div></div>
              <div><label>经度：</label><div class="info"><?= $v['data']['lng'];?></div></div>
              <div><label>类型：</label><span class="view_warn"><div class="info"><?= $v['data']['type'];?></div></div>
              <div><label>纬度：</label><?= $v['data']['lat'];?></span>
              &nbsp;&nbsp;&nbsp;&nbsp;</div>
          </div>
<!--           <div class="icon_corner_warn"></div> -->
        </div>
        <?php endforeach;?>

  </div>
</form>
<div class="foot">
	<a class="btn-download" href="http://cwlserver.cxql.net/index.php?g=Promotion&m=Down&a=index">下载车微联APP</a>
</div>
</body>
</html>
