<?php
use yii\widgets\ListView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
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
    
    <script>
    function probar(map){
          var myLatLng = {lat: -34.9036100, lng: -56.1640446};
          var marker = new google.maps.Marker({
        position: myLatLng,
        map: mapa,
        title: 'Marcador con el nombre'
        });
      }   
    function initMap() {
//          
      
        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.9036100, lng: -56.1640446}, 
          scrollwheel: false,
          zoom: 13
        });
             
     
      
      
      
      
      probar(map);
      
      
      
  }   
</script>
    
    
    
  <body>
   
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

<script type="text/javascript" 
src="http://www.google.com/jsapi?key="></script>
  
    </div>
</div>
