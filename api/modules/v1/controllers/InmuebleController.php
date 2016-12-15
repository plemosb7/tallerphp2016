<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use common\models\Inmueble;

class InmuebleController extends ActiveController
{
    public $modelClass = 'common\models\Inmueble';
    

    public function actionSearch2($cantBanos,$cantDorm )
    {
          $query = Inmueble::find();
        
        if (isset($cantBanos)) {
             // grid filtering conditions
            $query->andFilterWhere([
                'cantBanos' => $cantBanos,
            ]);
        }
        if (isset($cantDorm)) {
             // grid filtering conditions
            $query->andFilterWhere([
                'cantDorm' => $cantDorm,
            ]);
        }
       

        // use dektrium/user/helper/Password
        // Password::hash($password)
        return $query->all();
        
    }

}