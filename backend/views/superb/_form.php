<!doctype html>
<html>
<?php 
use yii\helpers\Html;
use backend\controllers\SuperbController;
use yii\widgets\ActiveForm;
use backend\assets\AppAsset;
use yii\helpers\Url;
AppAsset::register($this);
$this->beginPage();
?>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>车微联_精彩回顾</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/b_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<style>
	body{
		background:#f2f2f2;
	}
</style>
</head>

<body>
	<div class="container">
    	<div class="content-list">
    	<?php if(!empty($info)):?>
    	<?php foreach ($info as $k=>$v):?>
            <div class="list-wrap">
            	<a href="index.php?r=superb/view&id=<?= $v['id']?>" class="content-image cont-flex">
                	<!-- <p class="little-img" style="background-image:url(<?= $v['img'];?>)"></p> -->
                	<img class="little-img" alt="" src="<?= $v['img'];?>">
                    <p class="little-title"><?= $v['title'];?></p>
                </a>
            </div>
            <?php endforeach;?>
            <?php endif;?>
    </div>

</body>
</html>
