<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\assets\AppAsset;
use frontend\models\RoadForm;
use frontend\controllers\RoadController;

use frontend\controllers\IllegalController;
use common\lib\HttpGet;

AppAsset::register($this);
$this->beginPage();
AppAsset::register($this);
$this->beginPage();
/**
 * 
 */
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>车微联_高速路况</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="css/b_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<style>
	body{
		background:#f2f2f2;
	}
</style>
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
</head>

<body>
<?php $this->beginBody()?>
<?php   $form = ActiveForm::begin();?>
<?php //var_dump('<pre>',$info); ?>
	<div class="wrap">
          <?php $leng = 5; foreach ($info as $k =>$v){?>
        <div style="margin-top:20px;">
        	<div class="weui_cells weui_cells_access" id="b">
                <a class="weui_cell" href="javascript:;">
                    <div class="weui_cell_bd weui_cell_primary" >
                    <?php //if ($k<$leng){?>
                    	<div class="high-num"  >
                    	<?php echo $v['detail']['lineNo']?>
                        </div>
                        <div class="high-info">
                            <div class="title"><?php echo $v['detail']['name'];?></div>
                            <div class="descrip red"><?php echo $v['detail']['city'];?></div> 
                        </div>
                    </div>
                    <div class="weui_cell_ft">
                    </div>
                </a>
            </div>
            
<!-- <div class="container" >       -->      
     <div class="row">
      <div class="col-xs-12" >
        <div class="row">
          <div class="col-xs-4" style="padding:0"><a href="#" class="tabs-nav active" id="nav_row1" data-block="row1">途经地点</a></div>
          <div class="col-xs-4" style="padding:0"><a href="#" class="tabs-nav" id="nav_row2" data-block="row2">高速路况</a></div>
          <div class="col-xs-4" style="padding:0"><a href="#" class="tabs-nav" id="nav_row3" data-block="row3">附近入口</a></div>
        </div>
      </div>
    </div>
    <!-- -->
    <div class="row list-row" id="row1" style="background:#fff;">
      <div class="col-xs-12">
          <div class="high-root"><?php echo str_replace(' ', '</div><div class="high-root">', $v['detail']['allCitys']);?></div>
      </div>
    </div>
    <!-- -->
    <!-- -->
    		<div class="row list-row" id="row2" style="display:none;">
      <div class="col-xs-12">
      <?php  if (!empty($v['traffic'])){
          
          foreach ($v['traffic'] as $a=>$b){
      ?>
        <div class="high-road">
     
        	<div class="title"><?= $b['exceptionReason'];?></div>
            <div>
            	<label>发布时间：</label><?= $b['pubTime']?>
            </div>
            <div>
            	<label>预计恢复时间：</label><?= $b['expectedRecoveryTime'];?>
            </div>
            <div>
            	<label>起始桩号：</label><?= $b['StartPileNo'];?>
            </div>
            <div>
            	<label>结束桩号：</label><?= $b['endPileNo'];?>
            </div>
            <div class="high-texts"><?= $b['trafficTip'];?>
            </div>
        </div>
        <?php }?>
        <?php }?>
      </div>
    </div>
    <!-- -->
    <!-- -->
    <div class="row list-row" id="row3" style="display:none;">
      <div class="col-xs-12" style="padding:0">
      <?php
      /**
       * 和控制器方法里的一致，里边的$v值遍历
       */
          if (!empty($v['toll'])){
          foreach ($v['toll'] as $m=>$c){
      ?>
        <div class="high-list">
        	<span class="hight-sign">入口</span> <span class="title"><?= $c['tollbooth'];?></span> <span class="speed"><?= $c['distance'] = substr($c['distance'], 0,5); ?>km</span>
        </div>

		<?php }?>
      <?php }?>
      </div>
      
    </div>
    </div>
 <!-- -->
        </div>
        <?php //}?>
        <?php }?>
          <?php  ActiveForm::end();?>
          <?php $this->endBody()?>
    </div>
</body>
</html>