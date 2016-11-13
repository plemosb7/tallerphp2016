<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\RolOperacion;
use backend\models\Rol;
use backend\models\Operacion;

/* @var $this yii\web\View */
/* @var $model backend\models\RolOperacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rol-operacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rol_id')->dropDownList(ArrayHelper::map(Rol::find()->all(),'id','nombre')) ?>

    <?= $form->field($model, 'operacion_id')->dropDownList(ArrayHelper::map(Operacion::find()->all(),'id','nombre')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
