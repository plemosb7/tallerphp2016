<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\InmuebleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inmuebles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inmueble-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Inmueble', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'tipoInmueble_id',
            'idCliente',
            'cantDorm',
            // 'cantBanos',
            // 'supTotal',
            // 'supEdificada',
            // 'garage',
            // 'patio',
            // 'latitud',
            // 'longitud',
            // 'foto1',
            // 'foto2',
            // 'foto3',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
    <?=
    ListView::widget([
        'dataProvider' => $dataProvider,
    ]);
    ?>
    
</div>
