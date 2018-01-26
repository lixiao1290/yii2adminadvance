<?php

?>
<?php foreach($ls as $row):?>
<? if ($row['city']==$_GET['startCity'].'-'.$_GET['startCity']) :?>
<? else: ?>
<a class="weui_cell" href="javascript:;" onclick="$('#lineNo').val($(this).find('.title').text()); $('#roadform-endcity').val(($(this).find('.descrip').text().split('-')[1]));$('#w0').submit();">
                    <div class="weui_cell_bd weui_cell_primary">
                    	<div class="high-num">
                        	<?=$row['lineNo']?>
                        </div>
                        <div class="high-info">
                            <div class="title"><?=$row['lineNo']?> </div>
                            <div class="descrip red"><?=$row['city'] ?> </div>
                        </div>
                    </div>
                    <div class="weui_cell_ft">
                    </div>
                </a>
                <? endif; ?>
<?php endforeach;?>                