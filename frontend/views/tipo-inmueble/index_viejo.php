<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\TipoInmuebleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipo Inmuebles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-inmueble-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tipo Inmueble', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['attribute'=>'id','label'=>'codigo'],
            'nombre',
            ['class' => 'yii\grid\ActionColumn'],
           
        ],
    ]); ?>
    
    
</div>
