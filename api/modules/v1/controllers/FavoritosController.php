<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use common\models\Favoritos;
use common\models\User;

class FavoritosController extends ActiveController
{
    public $modelClass = 'common\models\Favoritos';
    public function actionMisfavoritos($nombreUsuario){
        $query = User::find();
        $query->andFilterWhere(['username' => $nombreUsuario]);
        $user=$query->one();
        if($user==NULL){
            return 'false'; 
        }
        else {
            $query2=Favoritos::find();
            $query2->andFilterWhere(['cliente_id' => $user->id]);
            return $query2->all();
        }
    }
    public function actionCrearfavorito($nombreUsuario,$idInmueble){
         $query = User::find();
         $query->andFilterWhere(['username' => $nombreUsuario]);
         $user=$query->one();
         if($user==NULL){
             return 'false'; 
         }
         else{
             $model= new Favoritos();
             $model->cliente_id=$user->id;
             $model->inmueble_id=$idInmueble;
             $model->save();
             return 'true';
         }
    }
}