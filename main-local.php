<?php

$config = [
    'components' => [
      'elasticsearch' => [
        'class' => 'yii\elasticsearch\Connection',
        'nodes' => [
          ['http_address' => '127.0.0.1:9200'],
          // configure more hosts if you have a cluster
        ],
      ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'FoNNm1XEvCyUG7L4a1zMfJ6K4a_j9rYf',
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
