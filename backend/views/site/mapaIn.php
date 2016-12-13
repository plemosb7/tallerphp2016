<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use voime\GoogleMaps\MapInput;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'address')->textInput(['id'=>'address-input']) ?>

<?php
echo MapInput::widget([
    'height' => '400px',
    'zoom' => Yii::$app->params['map_zoom_one'],
    'countryInput' => 'country-input',
    'mapOptions' => [
        'styles' => file_get_contents(Yii::getAlias('@webroot/res/map-styles.json')),
        'maxZoom' => '15',
    ],
    'markerOptions' => ['icon'=>"'" . Yii::getAlias('@web/res/img/marker.png') . "'"],
]);
?>
<?=$form->field($model, 'latitude')->hiddenInput(['id'=>'lat-input'])->label(false) ?>
<?=$form->field($model, 'longitude')->hiddenInput(['id'=>'lng-input'])->label(false) ?>
<?=$form->field($model, 'country')->hiddenInput(['id'=>'country-input'])->label(false) ?>

 <?php ActiveForm::end(); ?>