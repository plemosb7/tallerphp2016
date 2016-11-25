<?php
use yii\widgets\ListView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->registerJsFile( 
    'tallerphp2016/frontend/web/js/main.js', 
    ['depends' => '\yii\web\JqueryAsset']
);

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

   <div class="body-content">
       <?php   echo $this->render('_search', ['model' => $searchModel]); ?>

       

   <div class="row">
  
</div>


  
   

    </div>
</div>
