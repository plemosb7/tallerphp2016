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
    
    <?=
    ListView::widget([
        'dataProvider' => $dataProvider,
        
        'itemView'=>'item-view',
        'pager' => [
        'firstPageLabel' => 'first',
        'lastPageLabel' => 'last',
        'prevPageLabel' => 'previous',
        'nextPageLabel' => 'next',
    ],
        'options' => [
        'tag' => 'div',
        'class' => 'list-wrapper',
        'id' => 'list-wrapper',
    ],
    ]);
    ?>
</div>
