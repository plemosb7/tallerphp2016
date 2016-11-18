<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Inmueble */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inmueble-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipoInmueble_id')->dropDownList(ArrayHelper::map(\common\models\TipoInmueble::find()->all(),'id','nombre')) ?>

    <?= $form->field($model, 'idCliente')->dropDownList(ArrayHelper::map(\common\models\User::find()->all(),'id','username')) ?>

    <?= $form->field($model, 'cantDorm')->textInput() ?>

    <?= $form->field($model, 'cantBanos')->textInput() ?>

    <?= $form->field($model, 'supTotal')->textInput() ?>

    <?= $form->field($model, 'supEdificada')->textInput() ?>

    <?= $form->field($model, 'garage')->textInput() ?>

    <?= $form->field($model, 'patio')->textInput() ?>

    <?= $form->field($model, 'latitud')->textInput() ?>

    <?= $form->field($model, 'longitud')->textInput() ?>

    <?= $form->field($model, 'foto1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto3')->textInput(['maxlength' => true]) ?>
   
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
