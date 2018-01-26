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
  
    <div class="row">
      <div class="col-xs-12" >
        <div class="row">
          <div class="col-xs-4" style="padding:0"><a href="#" class="tabs-nav active" id="nav_row1" data-block="row1">全部</a></div>
          <div class="col-xs-4" style="padding:0"><a href="#" class="tabs-nav" id="nav_row2" data-block="row2">未处理</a></div>
          <div class="col-xs-4" style="padding:0"><a href="#" class="tabs-nav" id="nav_row3" data-block="row3">已处理</a></div>
        </div>
      </div>
    </div>
    <!-- -->
    
    <div class="row list-row" id="row1">
      <div class="col-xs-12">
      <?php foreach ($info as $k):?>
        <div class="form-cells">
          <div class="view_tab_list">    
              <div><label>时间：</label><div class="info"><?= $k->WFSJ?></div></div>
              <div><label>地点：</label><div class="info"><?= $k->WFDZ ?></div></div>
              <div><label>违法：</label><div class="info"><?= $k->WFMS?></div></div>
              <div><label>罚款：</label><span class="view_warn"><?= $k->FKJE_MIN ?>元</span>&nbsp;&nbsp;&nbsp;&nbsp;记分：<span class="view_warn"><?= $k->WFJFS ?>分</span></div>
          </div>
          <div class="icon_corner_warn"></div>
        </div>
        <?php endforeach;?>
        
      </div>
    </div>
    <!-- -->
    <!-- -->
    <div class="row list-row" id="row2" style="display:none;">
      <div class="col-xs-12">
      
      <?php $clsj = $k->CLSJ;
            if ($clsj == '')
            {
      ?>
      <?php foreach ($info as $k):?>
        <div class="form-cells">
          <div class="view_tab_list">    
              <div><label>时间：</label><div class="info"><?= $k->WFSJ?></div></div>
              <div><label>地点：</label><div class="info"><?= $k->WFDZ ?></div></div>
              <div><label>违法：</label><div class="info"><?= $k->WFMS?></div></div>
              <div><label>罚款：</label><span class="view_warn"><?= $k->FKJE_MIN ?>元</span>&nbsp;&nbsp;&nbsp;&nbsp;记分：<span class="view_warn"><?= $k->WFJFS ?>分</span></div>
          </div>
          <div class="icon_corner_warn"></div>
        </div>
        <?php endforeach;?>
        <?php }?>
        
      </div>
    </div>
    <!-- -->
    <!-- -->
    <div class="row list-row" id="row3" style="display:none;">
      <div class="col-xs-12">
      <?php $clsj = $k->CLSJ;
            if ($clsj != '')
            {
      ?>
      <?php foreach ($info as $k):?>
        <div class="form-cells">
          <div class="view_tab_list">    
              <div><label>时间：</label><div class="info"><?= $k->WFSJ?></div></div>
              <div><label>地点：</label><div class="info"><?= $k->WFDZ ?></div></div>
              <div><label>违法：</label><div class="info"><?= $k->WFMS?></div></div>
              <div><label>罚款：</label><span class="view_warn"><?= $k->FKJE_MIN ?>元</span>&nbsp;&nbsp;&nbsp;&nbsp;记分：<span class="view_warn"><?= $k->WFJFS ?>分</span></div>
          </div>
          <div class="icon_corner_default"></div>
        </div>
        <?php endforeach;?>
        <?php }?>
        
      </div>
    </div>
    
  </div>
</form>
<div class="foot">
	<a class="btn-download" href="http://cwlserver.cxql.net/index.php?g=Promotion&m=Down&a=index">下载车微联APP</a>
</div>
</body>
</html>
