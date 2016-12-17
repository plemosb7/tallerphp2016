<?php

namespace api\modules\v1\controllers;

use yii;

use yii\rest\ActiveController;
use common\models\User;
use dektrium\user\helpers\Password;
use common\models\LoginForm;        

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
    
    public function actionIniciarsesion($nombre,$contrasena){
         $query = User::find();
         $query->andFilterWhere(['username' => $nombre]);
         $user=$query->one();
//         return Yii::$app->getSecurity()->validatePassword(contrasena, $user->password_hash);
//         return Password::validate($contrasena,$user->password_hash);
        if(Password::validate($contrasena,$user->password_hash)){
            return 'true';
        }
        else{
            return 'false';
        }
        
    }
    
 
}