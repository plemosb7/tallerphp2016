<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\search\InmuebleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inmueble-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'tipoInmueble_id') ?>

    <?= $form->field($model, 'idCliente') ?>

    <?= $form->field($model, 'cantDorm') ?>

    <?php // echo $form->field($model, 'cantBanos') ?>

    <?php // echo $form->field($model, 'supTotal') ?>

    <?php // echo $form->field($model, 'supEdificada') ?>

    <?php // echo $form->field($model, 'garage') ?>

    <?php // echo $form->field($model, 'patio') ?>

    <?php // echo $form->field($model, 'latitud') ?>

    <?php // echo $form->field($model, 'longitud') ?>

    <?php // echo $form->field($model, 'foto1') ?>

    <?php // echo $form->field($model, 'foto2') ?>

    <?php // echo $form->field($model, 'foto3') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
