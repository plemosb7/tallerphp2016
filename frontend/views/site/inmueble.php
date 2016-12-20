<?php
use yii\widgets\ListView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->registerJsFile( 
    'tallerphp2016/frontend/web/js/buscarid_imagenesymapa.js', 
    ['depends' => '\yii\web\JqueryAsset']
);

$this->registerJsFile( 
    'tallerphp2016/frontend/web/js/nose.js', 
    ['depends' => '\yii\web\JqueryAsset']
);

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
    



<div class="imagen"></div>
<div class="btnFv" style="float: right;"></div>
<div id="map" style="width:500px;height:290px;float: left;"></div>
<table class="row">
    
    
</table>




<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuYHJ6iStsZb1UYtUDZ3G7yeb0Zd4f0i4&callback=initMap"
    async defer> </script>


<form>
        <input type="hidden" id="idInmueble" value="<?php echo $id?>">
    </form>

