<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use common\models\Inmueble;

class InmuebleController extends ActiveController
{
    public $modelClass = 'common\models\Inmueble';
    
    public function actionSearch($cantBanos )
    {
        $query = Inmueble::find();
        
        if (isset($cantBanos)) {
             // grid filtering conditions
            $query->andFilterWhere([
                'cantBanos' => $cantBanos,
            ]);
        }
       

        // use dektrium/user/helper/Password
        // Password::hash($password)
        return $query->all();
        
    }
}