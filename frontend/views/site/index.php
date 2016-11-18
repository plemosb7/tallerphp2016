<?php
use yii\widgets\ListView;
$this->registerJsFile( 
    'tallerphp2016/frontend/web/js/main.js', 
    ['depends' => '\yii\web\JqueryAsset']
);

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

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

    </div>
</div>
