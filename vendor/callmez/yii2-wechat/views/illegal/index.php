
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
</head>

<body>															
<form name="form1" id="form1" method="post" action="index.php?r=test/details">
  <input type="hidden" id="signid" name="signid" value="null" />
  <div class="container">
    <div class="row">
      <div class="col-xs-12" >
        <div class="row">
          <div class="col-xs-6" style="padding:0"><a href="#" class="tabs-nav active" id="nav_row1">机动车违法</a></div>
          <div class="col-xs-6" style="padding:0"><a href="#" class="tabs-nav" id="nav_row2">驾驶人违法</a></div>
        </div>
      </div>
    </div>
    <div class="row" style="margin-top:20px; display:none;" id="row1">
      <div class="col-xs-12">
        <div class="form-group">
          <label class="text-muted">车辆类型</label>
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
          </select>
        </div>
        <div class="form-group">
          <label class="text-muted">车牌号码</label>
          <input class="form-control"  name="hphm"  id="hphm" type="text" placeholder="" autofocus required="" tabindex="1"  value="鲁"/>
        </div>
        <div class="form-group">
          <label class="text-muted">车架号后六位</label>
          <input class="form-control" type="text" name="clsbdh" id="clsbdh" placeholder="请输入车架号后六位" autofocus required="" tabindex="2"/>
        </div>
        <div class="btn_div">
          <button class="btn_sub"  id="submitButton" name="submitButton" type="submit">查询</button>
        </div>
      </div>
    </div>
    <div class="row" style="margin-top:20px;" id="row2">
      <div class="col-xs-12">
        <div class="form-group">
          <label class="text-muted">证件类型</label>
          <select class="form-control" name="hpzl" id="hpzl2">
            <option value="01">身份证</option>
            <option value="02">军官证</option>
            <option value="03">士兵证</option>
            <option value="04">军官离退休证</option>
            <option value="05">境外人员身份证明</option>
            <option value="06">交外人员身份证明</option>
          </select>
        </div>
        <div class="form-group">
          <label class="text-muted">证件号码</label>
          <input class="form-control"  name="hphm"  id="hphm2" type="text" placeholder="" autofocus required="" tabindex="1"  />
        </div>
        <div class="form-group">
          <label class="text-muted">驾驶证档案编号后六位</label>
          <input class="form-control" type="text" name="clsbdh" id="clsbdh2" placeholder="请输入驾驶证档案编号后六位" autofocus required="" tabindex="2"/>
        </div>
        <div class="btn_div">
          <button class="btn_sub"  id="submitButton2" name="submitButton" type="submit">查询</button>
        </div>
      </div>
    </div>
    
  </div>
</form>
<div class="foot">
	<a class="btn-download" href="http://www.baidu.com">下载车微联APP</a>
</div>
</body>
</html>
