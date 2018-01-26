<?php
use yii\helpers\Html;
use yii\grid\GridView;
use callmez\wechat\models\ReviewRule;
use callmez\wechat\widgets\PagePanel;

$this->title = '文章发布';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php PagePanel::begin(['options' => ['class' => 'review-index']]) ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('文章发布', ['create', 'id' => $id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'tableOptions' => ['class' => 'table table-hover'],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
            'attribute' => 'id',
            'options' => [
                'width' => 75
            ]
            ],
            [
                'attribute' => 'title',
                'options' => [
                    'width' => 75
                ]
            ],
            [
            'attribute' => 'content',
            'options' => [
                'width' => 75
            ]
            ],
            [
            'attribute' => 'img',
            'options' => [
                'width' => 75
            ]
            ],
            [
            'attribute' => 'created_at',
            'options' => [
                'width' => 75
            ]
            ],
            [
                'class' => 'callmez\wechat\widgets\ActionColumn',
                //{update}
                'template' => ' {delete}',
                'options' => [
                    'width' => 80
                ]
            ],
        ],
    ]); ?>
<?php PagePanel::end() ?>