<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

class LoginFormController extends ActiveController
{
    public $modelClass = 'common\models\LoginForm';
}