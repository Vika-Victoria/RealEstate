<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'main',//open main
    'modules' => [
        'main' => [
            'class' => 'app\modules\main\Module',
        ],
        'cabinet' => [
            'class' => 'app\modules\cabinet\Module',
        ],
    ],
    'components' => [

        'assetManager' => [
            'bundles' => [
                'dosamigos\google\maps\MapAsset' => [
                    'options' => [
                        'key' => 'AIzaSyDbx8oMNrbvztpUaWmAhGhs8HjNSaUZD9c',
//                        'language' => 'id',
//                        'version' => '3.1.18'
                    ]
                ]
            ]
        ],

          'mail' => [
                'class'            => 'gulltour\phpmailer\Mailer',
                'viewPath'         => '@common/mail',
                'useFileTransport' => false,
                'config'           => [
                    'mailer'     => 'smtp',
                    'host'       => 'smtp.gmail.com',
                    'port'       => '465',
                    'smtpsecure' => 'ssl',
                    'smtpauth'   => true,
                    'username'   => 'vik1126111@gmail.com',
                    'password'   => '',
                    'charset' => 'UTF-8',
                ],
            ],
        'common' => [
            'class' => 'frontend\components\Common',
        ],


        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => '/frontend/web/main/main/login',
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
