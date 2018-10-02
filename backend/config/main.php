<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'name'=>'Pony shop',
    'basePath' => dirname(__DIR__),
    'homeUrl' => '/admin',
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
  'language' => 'uk',
    'modules' => [
      'rbac' => [
        'class' => 'mdm\admin\Module',
        'controllerMap' => [
          'assignment' => [
            'class' => 'mdm\admin\controllers\AssignmentController',
            /* 'userClassName' => 'app\models\User', */
            'idField' => 'id',
            'usernameField' => 'username',

          ],
        ],
        'layout' => 'left-menu',
        'mainLayout' => '@app/views/layouts/main.php',
        ],

    ],
    'components' => [
      'authManager' => [
        'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
      ],
 /*     'search' => [
        'class' => 'himiklab\yii2\search\Search',
        'models' => [
          'common\models\Products',
        ],
      ],*/
        'view' => [
          'theme' => [
            'pathMap' => [
              '@app/views' => '@app/views'
            ],
          ],
        ],
        'assetManager' => [
          'bundles' => [
            'backend\assets\AdminLteAsset' => [
              'skin' => 'skin-black',
            ],
          ],
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
          'baseUrl'=> '/admin',
        ],
      'user' => [
        'identityClass' => 'common\models\User',
        'loginUrl' => ['site/login'],
      ],
   /*     'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],*/
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [

            ],
        ],
    ],
    'as access' => [
      'class' => 'mdm\admin\components\AccessControl',
      'allowActions' => [
       // 'site/*',
     //   'admin/*',
       // 'some-controller/some-action',
        //'rbac/*',
        // The actions listed here will be allowed to everyone including guests.
        // So, 'admin/*' should not appear here in the production, of course.
        // But in the earlier stages of your development, you may probably want to
        // add a lot of actions here until you finally completed setting up rbac,
        // otherwise you may not even take a first step.
      ]
    ],
    'params' => $params,
];
