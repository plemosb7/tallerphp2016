<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Favoritos */

$this->title = 'Update Favoritos: ' . $model->inmueble_id;
$this->params['breadcrumbs'][] = ['label' => 'Favoritos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->inmueble_id, 'url' => ['view', 'id' => $model->inmueble_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="favoritos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
