
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
        </div>
      </div>
    </div>
    <div class="row" style="margin-top:20px;" id="row2">
      <div class="col-xs-12">
        <div class="form-group">
        <div class="form-group">
          <label class="text-muted">起始城市名称</label>
          <input class="form-control" type="text" name="startCity" id="clsbdh2" placeholder="请输入起始城市名称" autofocus required="" tabindex="2"/>
        </div>
        
        <div class="form-group">
          <label class="text-muted">结束城市</label>
          <input class="form-control" type="text" name="endCity" id="clsbdh2" placeholder="请输入结束城市名称" autofocus required="" tabindex="2"/>
        </div>
        
        <div class="form-group">
          <label class="text-muted">高速ID</label>
          <input class="form-control" type="text" name="lineId" id="clsbdh2" placeholder="请输入高速ID" autofocus required="" tabindex="2"/>
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
