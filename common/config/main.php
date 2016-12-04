<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
       
//         'user' => [
//                'class' => 'common\models\User',
//                'identityClass' => 'dektrium\user\models\User',
//            ],
    ],
    'modules' => [
        'user' => [
        'class' => 'dektrium\user\Module',
//        'modelMap'=>[
//                'User'=>'common\models\User'
//        ],
        'enableUnconfirmedLogin' => true,
        'confirmWithin' => 21600,
        'cost' => 12,
        'admins' => ['emino367']
        ],
    ]
];
