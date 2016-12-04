<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';
    
    public function actionLogin(){

        $model = new LoginForm();
         if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->login()) {
        //    return Yii::$app->user->identity->getAuthKey();
        //    return ApiResponse::reponseWithStatus(['accessToken' => Yii::$app->user->identity->getAuthKey(), 'NameUser' => Yii::$app->user->identity->username, 'NameUser' => Yii::$app->user->identity->id]);
         return ApiResponse::reponseWithStatus(['accessToken' => Yii::$app->user->identity->getAuthKey(), 'NameUser' => Yii::$app->user->identity->username, 'idUser' => Yii::$app->user->identity->id]);

         } else {
            
            return ApiResponse::reponseWithStatus(Yii::$app->getRequest()->getBodyParams(), 403);
         }
    }
}