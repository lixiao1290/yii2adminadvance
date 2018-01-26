<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\assets\AppAsset;
use frontend\models\RoadForm;
use frontend\controllers\RoadController;
use yii\helpers\Url;
AppAsset::register($this);
$this->beginPage();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>车微联_高速路况查询</title>
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
<?php $form = ActiveForm::begin();?>
<input type="hidden" name="lineNo" id="lineNo"/>
	<div class="wrap">
    	<div class="high-top">
        	<div class="high-btn">
<!--             	<span class="fa fa-map-pin"></span> -->
            </div>
        	<div class="high-input">
            	<div style="border-bottom:1px solid #e2e2e2; padding:0 10px;">
<!--                   <input type="text" class="high-txt red-txt"  placeholder="我的位置" name="startCity"> -->
				<?= $form->field($model, 'startCity')->textInput(['onchange'=>'support(this)','']);?>
                </div>
                <div style="padding:0 10px;">
<!--                 	<input type="text" class="high-txt" placeholder="请输入终点" name="startCity"> -->
				<?= $form->field($model, 'endCity');?>
                </div>
            </div>
            <div class="high-btn">
            	<button class="btn-block">搜索</button>
            </div>
        </div>
        <div style="margin-top:20px;">
        	<div class="weui_cells weui_cells_access">
                
                
            </div>
        </div>
          <?php ActiveForm::end();?>
          
        <div style="margin-top:20px;">
        <?php $this->endBody()?>
</body><script type="text/javascript">
function support(t)
{
	var st=t.value;
	$.ajax({
		type:"get",
		url:"<?='index.php?r=road/support' ?>&startCity="+st,
		async:true,
		success:function(rs) {
			//console.log(rs);
			var rst=$.parseJSON(rs);
			if(rst.code==10000||rst.code==10008) {
				$('.weui_cells').append(rst.html);
			}
		}
	});
	 
}
</script>
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
</html>
