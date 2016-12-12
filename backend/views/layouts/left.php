<?php 
use yii\helpers\Html;
?>
<aside class="main-sidebar">
    <section class="sidebar">

        <!-- Sidebar user panel -->
        <?php if(!Yii::$app->user->isGuest){ 
        echo '
        <div class="user-panel">
            <div class="pull-left image">
                <img src="';
        
        echo $directoryAsset ; 
        
        echo '/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>';
        echo Yii::$app->user->identity->username;
        echo '</p>

                
            </div>
        </div> ';
        
//        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        
        
        }
        if((!Yii::$app->user->isGuest)&&Yii::$app->user->identity->isAdmin){
            echo '<p>usted es administrador</p>';
        }
        else{
        echo '<p>inicie sesion</p>';
        }
        ?>
        
        <!-- search form -->
<!--        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->
        <?php if(((!Yii::$app->user->isGuest)&&Yii::$app->user->identity->isAdmin)){
        echo Html::a(
                                        'Sign out',
                                        ['/site/logout'],
                                        ['data-method' => 'post', 'class' => 'label']
                                    ); 
                                    
                                    }?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
//                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
//                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
//                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['/user/security/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Usuarios', 'url' => ['/user/admin/index'], 'visible' => ((!Yii::$app->user->isGuest)&&Yii::$app->user->identity->isAdmin)],
                    ['label' => 'Inmuebles', 'url' => ['/inmueble/index'], 'visible' => ((!Yii::$app->user->isGuest)&&Yii::$app->user->identity->isAdmin)],
                    ['label' => 'Tipos Inmuebles', 'url' => ['/tipo-inmueble/index'], 'visible' => ((!Yii::$app->user->isGuest)&&Yii::$app->user->identity->isAdmin)],
                    ['label' => 'Mis Inmuebles', 'url' => ['/inmueble/misinmuebles'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Publicar Inmueble', 'url' => ['/inmueble/create'], 'visible' => !Yii::$app->user->isGuest],
                    
                ],
            ]
        ) ?>

    </section>

</aside>
