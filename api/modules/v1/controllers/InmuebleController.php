<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use common\models\Inmueble;

class InmuebleController extends ActiveController
{
    public $modelClass = 'common\models\Inmueble';
    
   public function actionSearch($cantBanos, $cantDorm,  $tipoInmueble_id, $garage,$patio )
    {
        $query = Inmueble::find();
        
        if (isset($cantBanos)) {
             // grid filtering conditions
            $query->andFilterWhere([
                'cantDorm' => "4",    
            ]);
        }
       
        if (isset($cantDorm)) {
             // grid filtering conditions
            $query->andFilterWhere([
                'cantDorm' => $cantDorm,
            ]);
        }
        if (isset($tipoInmueble_id)) {
             // grid filtering conditions
            $query->andFilterWhere([
                'tipoInmueble_id' => $tipoInmueble_id,
            ]);
        }
        
        if (isset($garage)) {
             // grid filtering conditions
            $query->andFilterWhere([
                'garage' => $garage,
            ]);
        }
        
        if (isset($patio)) {
             // grid filtering conditions
            $query->andFilterWhere([
                'patio' => $patio,
            ]);
        }
        

        // use dektrium/user/helper/Password
        // Password::hash($password)
        return $query->all();
        
    }
    
}