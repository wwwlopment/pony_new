<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class ModernAsset extends AssetBundle
{



  public $basePath = '@webroot';
  public $baseUrl = '@web';
  public $css = [
    'css/bootstrap.css',
    'css/style.css',
    'css/animate.min.css',
    'css/font-awesome.min.css',
  ];
  public $js = [
    //'//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js',
    //'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js',
    //
    //
    'js/jquery-1.11.1.min.js',
    //
   'https://code.jquery.com/jquery-3.0.0.js',
    'http://code.jquery.com/jquery-migrate-1.2.1.min.js',

   // 'https://code.jquery.com/jquery-migrate-3.0.1.js',

'https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js',

    'js/jquery.countdown.min.js',
    'js/jquery.matchHeight.js',
    'js/modernizr.custom.js',
    //'js/simpleCart.min.js',
    'js/jquery-ui.js',
    'js/wow.min.js',
    'js/my_new.js',
    'js/move-top.js',
    'js/easing.js',
    'js/my_new2.js',
    'js/main.js',
    'js/my_new3.js',
    'js/bootstrap.js',
    'js/imagezoom.js',
    'js/move-top.js',
    'js/jquery.flexslider.js',

  ];
  public $depends = [
    'yii\web\YiiAsset',
    'yii\bootstrap\BootstrapAsset',
  ];

}
