<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TipoInmueble */

$this->title = 'Create Tipo Inmueble';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Inmuebles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-inmueble-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
