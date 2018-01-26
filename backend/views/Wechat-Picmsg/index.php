<?php
use common\widgets\PreViewWidget;

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use callmez\wechat\widgets\PagePanel;
use yii\base\Widget;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WechatPicmsgSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '图文消息';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
.coltd{
	width: 102px;
	height: 76px;
}
</style> 
<div class="wechat-picmsg-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?php  
    ?><p>
        <?= Html::a('创建图文消息', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    
    
    
    
    
    
     
  <div id="w0" class="grid-view">
 
   <table class="table table-striped table-bordered">
    <thead> 
     <tr>
      <th><a href="<?=Url::current()?>?sort=title" data-sort="title">标题</a></th>
      <th><a href="<?=Url::current()?>?sort=image" data-sort="image">图片</a></th>
      <th width="120"><a href="<?=Url::current()?>?sort=isbig" data-sort="isbig">是否 大图</a></th>
      <th><a href="<?=Url::current()?>?sort=image" data-sort="image">链接</a></th>
      <th class="action-column">&nbsp;</th>
     </tr>
     
    </thead> 
    <tbody> 
		<?php foreach ($dataProvider->getModels() as $data) { ?>
     <tr data-key="">
      <td>
      <?php $tok=strtok($data->title, ',');
                while (false!==$tok) {
                    echo '<p><div class="coltd">',$tok,'</div></p>'; 
                    $tok=strtok(',');
                }
      ?></td>
   
      <td>
      <?php $tok=strtok($data->image, ',');
                while (false!==$tok) {
                    echo '<p><div class="coltd"><img width="102" height="76" src="',Url::base(true),$tok,'" /></div></p>'; 
                    $tok=strtok(',');
                }
      ?></td>
      <td>是 </td>
      <td><?php $tok=strtok($data->link, ',');
                while (false!==$tok) {
                    echo '<p><div class="coltd">  '. $tok .'</div></p>'; 
                    $tok=strtok(',');
                }
      ?></td>
      <td>
      <a href="<?php echo Url::toRoute('wechat-picmsg/view') ?>&id=<?=$data->groupid ?>" title="查看" aria-label="查看" data-pjax="0">
      <span class="glyphicon glyphicon-eye-open"></span></a>
       <a href="<?php echo Url::toRoute('wechat-picmsg/update') ?>&id=<?=$data->groupid ?>" title="更新" aria-label="更新" data-pjax="0">
       <span class="glyphicon glyphicon-pencil"></span></a> 
       <a href="<?php echo Url::toRoute('wechat-picmsg/delete') ?>&id=<?=$data->groupid ?>" title="删除" aria-label="删除" data-confirm="您确定要删除此图文消息吗？" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a>
       
       </td>
     </tr> 
      <?php } ?>
    </tbody>
   </table>  
  </div>
 <div>
<?=LinkPager::widget(['pagination'=>$dataProvider->getPagination()]) ?> 
 </div>
    
    
    
    <?/* = GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'title',
            [
//             'label'=>'是否在头部',
            'attribute' => 'image',
                'format' => ['image',['width'=>'30','height'=>'30',]],
                'value' => function ($model) {
                 $htms='';
                 
                return '<img src="'. strtr($model->image , array(','=>'" /> <img src="') ) .'" />';
                },
            ],
             
            [
            'label'=>'是否在头部',
            'attribute' => 'isbig',
            'value' => function ($model) {
            $state = [
                '0' => '否',
                '1' => '是',
                 
            ];
            return $state[$model->isbig];
            },
            'headerOptions' => ['width' => '120']
            ],
            //'isbig',
//             'groupid',
            // 'wechat_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */ ?>
</div>
