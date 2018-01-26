<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?=Yii::$app->user->identity->username?Yii::$app->user->identity->username:'' ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
       <!--  <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->

        
	<?php 
	use yii\bootstrap\Nav;
	use mdm\admin\components\MenuHelper;
	
	//file_put_contents('F:\list.log', print_r(MenuHelper::getAssignedMenu(Yii::$app->user->id),true));
	 /*  echo Nav::widget(
			[
					"encodeLabels" => true,
					"options" => ["class" => "sidebar-menu"],
					"items" => MenuHelper::getAssignedMenu(Yii::$app->user->id),
			]
			); */
	
// 	var_dump('<pre>',MenuHelper::getAssignedMenu(Yii::$app->user->id));die;
	  echo   dmstr\widgets\Menu::widget(
	      [
	          'options' => ['class' => 'sidebar-menu'],
	      
	          'items' =>MenuHelper::getAssignedMenu(Yii::$app->user->id),
	  ]
	      )
	?>
    </section>

</aside>