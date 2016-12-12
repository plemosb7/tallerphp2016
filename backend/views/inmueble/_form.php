<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Inmueble */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inmueble-form">

    <?php $form = ActiveForm::begin([
          'options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipoInmueble_id')->dropDownList(ArrayHelper::map(\common\models\TipoInmueble::find()->all(),'id','nombre')) ?>

   <!--if(Yii::$app->user->identity->isAdmin) {-->
    <!--//<?$form->field($model, 'idCliente')->dropDownList([ArrayHelper::map(\common\models\User::find()->all(),'id','username')],[options=>['visible'=>'false']] )?>-->
    <!--<?$form->field($model, 'idCliente')->dropDownList([ArrayHelper::map(\common\models\User::find()->all(),'id','username')])?>-->
    <?= $form->field($model, 'cantDorm')->dropDownList([1,2,3,4,5,6,7,8,9], 
             ['prompt'=>'- seleccione dormitorios-']) ?>

    <?= $form->field($model, 'cantBanos')->dropDownList([1,2,3,4,5,6,7,8,9], 
             ['prompt'=>'- seleccione baños-']) ?>

    <?= $form->field($model, 'supTotal')->textInput() ?>

    <?= $form->field($model, 'supEdificada')->textInput() ?>

    <?= $form->field($model, 'garage')->checkbox(array('label'=>'Garage')) ?>

    <?= $form->field($model, 'patio')->checkbox(array('label'=>'Patio')) ?>

    <?= $form->field($model, 'latitud')->textInput() ?>

    <?= $form->field($model, 'longitud')->textInput() ?>
    
    
      <?= $form->field($model, 'image[]')->widget(FileInput::classname(), [
              'options' => ['accept' => 'image/*', 'multiple' => true],
              'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'],'showUpload' => false,],
              
              
          ]);   ?>
   
    

   
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

<div id="map" style="width:100%;height:500px"></div>

<script>
function myMap() {
  var mapCanvas = document.getElementById("map");
  var mapOptions = {
    center: new google.maps.LatLng(-34.93, -56.16), 
    zoom: 12
  }
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position: new google.maps.LatLng(-34.93, -56.16)});

//    marker.setMap(map);
  google.maps.event.addListener(map, 'click', function(event) {
//   placeMarker(map, event.latLng);
   var marker = new google.maps.Marker({position: event.latLng});

    marker.setMap(map);
    document.getElementById('inmueble-latitud').setAttribute('value',event.latLng.lat());
    document.getElementById('inmueble-longitud').setAttribute('value',event.latLng.lng());
  });
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?callback=myMap&&key=AIzaSyAf8eCBwsOUhcCUM2vYJ80X4nc9agB09is"></script>

   

</div>

