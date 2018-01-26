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
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<style type="text/css">
		body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
	</style>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=您的密钥"></script>
	<title>车微联</title>
</head>
<body>
	<div id="allmap"></div>
	<?php 
    	$getIp=$_SERVER["REMOTE_ADDR"];
    	echo 'IP:',$getIp;
    	echo '<br/>';
    	$content = file_get_contents("http://api.map.baidu.com/location/ip?ak=7IZ6fgGEGohCrRKUE9Rj4TSQ&ip=222.175.96.0&coor=bd09ll");
    	
    	$json = json_decode($content);
    	
    	echo 'lng:',$json->{'content'}->{'point'}->{'x'};//按层级关系提取经度数据
    	echo '<br/>';
    	echo 'lat:',$json->{'content'}->{'point'}->{'y'};//按层级关系提取纬度数据
    	echo '<br/>';
    	print $json->{'content'}->{'address'};//按层级关系提取address数据
	?>
</body>
</html>
<script type="text/javascript">

	// 百度地图API功能
	var map = new BMap.Map("allmap");
	var point = new BMap.Point(116.331398,39.897445);
	map.centerAndZoom(point,12);

	var geolocation = new BMap.Geolocation();
	geolocation.getCurrentPosition(function(r){
		if(this.getStatus() == BMAP_STATUS_SUCCESS){
			var mk = new BMap.Marker(r.point);
			map.addOverlay(mk);
			map.panTo(r.point);
			alert('您的位置：'+r.point.lng+','+r.point.lat);
			<?php $lng="<script>document.write(r.point.lng);
                  </script>";
			      $lat="<script>document.write(r.point.lat);
                  </script>";
            ?>
		}
		else {
			alert('failed'+this.getStatus());
		}        
	},{enableHighAccuracy: true})
	
	// 百度地图API功能
	var map = new BMap.Map("allmap");
	var point = new BMap.Point(116.331398,39.897445);
	map.centerAndZoom(point,12);

	function myFun(result){
		var cityName = result.name;
		map.setCenter(cityName);
		alert("当前定位城市:"+cityName);
		<?php $cityName="<script>document.write(cityName);</script>";?>
	}
	var myCity = new BMap.LocalCity();
	myCity.get(myFun);
</script>
