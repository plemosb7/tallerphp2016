<?php
use yii\widgets\ListView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
$this->registerJsFile( 
    'tallerphp2016/frontend/web/js/main.js', 
    ['depends' => '\yii\web\JqueryAsset']
);

$this->title = 'Taller de PHP 2016';
?>
<html>
<style>
        .carousel-inner { text-align: center; }
.carousel .item > img { display: inline-block; }
    </style>
   
    
<form name="buscador" method="post" action="index.php">
    Dormitorios:<input type="text" id="cantDorm" value="">
    Baños:<input type="text" id="cantBanos" value="">
    Garage:<input type="text" id="garage" value="">
    Patio:<input type="text" id="patio" value="">
    <input type="button" id="idButtonEnviar" value="Buscar"/>
    
</form>
  
    <div id="map" style="width:900px;height:450px; margin: auto"></div>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuYHJ6iStsZb1UYtUDZ3G7yeb0Zd4f0i4&callback=initMap"
    async defer> </script>
  </body>
</html>
    



<div class="site-index">

   <div class="body-content">
       <?php //   echo $this->render('_search', ['model' => $searchModel]); ?>

       

   <div class="row">
  
</div>


  
    </div>
</div>
