<?php
use yii\widgets\ListView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->registerJsFile( 
    'tallerphp2016/frontend/web/js/buscarid.js', 
    ['depends' => '\yii\web\JqueryAsset']
);

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<style>
        .carousel-inner { text-align: center; }
.carousel .item > img { display: inline-block; }
    </style>
    <script>
       function initMap() {
          var myLatLng = {lat: document.getElementById('latitud'), lng: document.getElementById('longitud')};
      
        // Create a map object and specify the DOM element for display.
        var mapInmueble = new google.maps.Map(document.getElementById('mapInmueble'), {
          center: {lat: -34.9036100, lng: -56.1640446}, 
          scrollwheel: false,
          zoom: 13
        });
             
     var marker = new google.maps.Marker({
    position: myLatLng,
    map: mapInmueble,
    title: 'Marcador con el nombre'
      });
  }   
</script>

<div class="imagen">
    
    
</div>
<div id="mapInmueble" style="width:500px;height:290px;float: left;"></div>
<table class="row">
    
    
</table>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuYHJ6iStsZb1UYtUDZ3G7yeb0Zd4f0i4&callback=initMap"
    async defer> </script>


<form>
        <input type="hidden" id="idInmueble" value="<?php echo $id?>">
    </form>

