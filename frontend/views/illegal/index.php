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
* @version:integral
*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\assets\AppAsset;
AppAsset::register($this);
$this->beginPage();

$arr = [
    '01'=>'大型汽车',
    '02'=>'小型汽车',
];
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
<script type="text/javascript">  
    // 对浏览器的UserAgent进行正则匹配，不含有微信独有标识的则为其他浏览器  
    var useragent = navigator.userAgent;  
    if (useragent.match(/MicroMessenger/i) != 'MicroMessenger') {  
        // 这里警告框会阻塞当前页面继续加载  
        alert('已禁止本次访问：您必须使用微信内置浏览器访问本页面！');  
        // 以下代码是用javascript强行关闭当前页面  
        var opened = window.open('about:blank', '_self');  
        opened.opener = null;  
        opened.close();  
    }  
</script>  
</head>

<body>
<?php $this->beginBody()?>
<!--<form name="form1" id="form1" method="post" action="../JdcBindService">-->
<?php $form = ActiveForm::begin();?>
  <input type="hidden" id="signid" name="signid" value="null" />
  <div class="container">
    <div class="row">
      <div class="col-xs-12" >
        <div class="col-xs-12">
          <div class="col-xs-12" style="padding:0"><a href="#" class="tabs-nav active" id="nav_row1">机动车违法</a></div>
          <!--<div class="col-xs-6" style="padding:0"><a href="#" class="tabs-nav" id="nav_row2">驾驶人违法</a></div>-->
        </div>
      </div>
    </div>
    <div class="row" style="margin-top:20px;id="row1">
      <div class="col-xs-12">
        <div class="form-group">
        <?= $form->field($model,'hpzl')->dropDownList($arr);?>
         <!-- <label class="text-muted">车辆类型</label>
          <select class="form-control" name="hpzl" id="hpzl">
            <option value="02">小型汽车</option>
            <option value="01">大型汽车</option>
            <option  value="05">外籍汽车</option>
            <option  value="07">两、三轮摩托车</option>
            <option  value="08">轻便摩托车</option>
            <option  value="13">农用运输车</option>
            <option  value="15">挂车</option>
            <option  value="16">教练汽车</option>
            <option  value="20">临时行驶车</option>
          </select>-->
        </div>
        <div class="form-group">
        <?= $form->field($model, 'hphm');?>
          <!--<label class="text-muted">车牌号码</label>
          <input class="form-control"  name="hphm"  id="hphm" type="text" placeholder="" autofocus required="" tabindex="1"  value="鲁"/>-->
        </div>
        <div class="form-group">
        <?= $form->field($model, 'clsbdh');?>
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
	<a class="btn-download" href="http://cwlserver.cxql.net/index.php?g=Promotion&m=Down&a=index">下载车微联APP</a>
</div>
<?php $this->endBody()?>
<script>
	$(document).ready(function(e) {
        $("#hphm").focus();
		
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