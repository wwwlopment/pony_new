<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\console\controllers\FixtureController',
            'namespace' => 'common\fixtures',
          ],
    ],
    'components' => [
        'authManager'  => [
          'class'        => 'yii\rbac\DbManager',
        ],
        'mailer' => [
          'class' => 'yii\swiftmailer\Mailer',
        //  'useFileTransport' => true,
          'transport' => [
            'class' => 'Swift_SmtpTransport',
            'host' => 'ssl://smtp.gmail.com',
            'username' => 'wwwlopment@gmail.com',
            'password' => 'shadowed777',
           // 'port' => '587',
            'port' => '465',
            'encryption' => 'tls',
          ],
        ],
      'search' => [
        'class' => 'himiklab\yii2\search\Search',
        'models' => [
          'common\models\Products',
        ],
      ],

        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'params' => $params,
];
