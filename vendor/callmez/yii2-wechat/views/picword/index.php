<?php
use yii\helpers\Url; 
echo 'hello';
?>


<?php foreach ($ls as $row) ?>
<?=$row->groupid ?>
<item>
<?php $count=count($row->title);
    for ($i=0;$i<$count;$i++) {
?>
<Title><?=$row->title[$i] ?></Title> 
<Description><![CDATA[description1]]></Description>
<PicUrl><?=Url::base(true).'/../'.$row->image[$i]; ?></PicUrl>
<Url><?=$row->link[$i] ?></Url>
<?php } ?>
</item>

</Articles>
</xml> 