<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\RolOperacion */

$this->title = 'Create Rol Operacion';
$this->params['breadcrumbs'][] = ['label' => 'Rol Operacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-operacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
