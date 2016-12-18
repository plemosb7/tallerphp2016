<?php
    $this->registerJsFile( 
    'tallerphp2016/frontend/web/js/login.js', 
    ['depends' => '\yii\web\JqueryAsset']
    );

?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                
                <p id="usuarioLogueado">Anonimo</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form id="loginForm" class="form-signin" action="left.php" method="post">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="usuario" class="form-control" placeholder="Usuario" required autofocus>
                <input type="password" id="contrasena" class="form-control" placeholder="Contraseña" required>
                
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="button" id="iniciarSesion">Iniciar Sesion</button>
        </form><!-- /form -->
        
        <button class="btn btn-lg btn-primary btn-block btn-signin" type="button" id="cerrarSesion" disabled="true">Cerrar Sesion</button>

        </section>

</aside>
