<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class UnicaseAsset extends AssetBundle
{

  public $basePath = '@webroot';
  public $baseUrl = '@web';
  public $css = [
    'css/bootstrap.min.css',
    //<!-- Customizable CSS -->
    'css/main.css',
    'css/green.css',
    'css/owl.carousel.css',
    'css/owl.transitions.css',
    'css/lightbox.css',
    'css/animate.min.css',
    'css/rateit.css',
    'css/bootstrap-select.min.css',
    'css/config.css',
    'http://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/themes/sunny/jquery-ui.css',
    //<!-- Icons/Glyphs -->
    'css/font-awesome.min.css',
    //<!-- Fonts -->
    'http://fonts.googleapis.com/css?family=Roboto:300,400,500,700',
    //'fonts/Bangers-Regular.ttf',
    'https://fonts.googleapis.com/css?family=Bangers',
  ];
  public $js = [
    //<!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
    //		<!--[if lt IE 9]>
  //  'js/html5shiv.js',
   // 'js/respond.min.js',

   // 'js/jquery-1.11.1.min.js',

'//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
'//ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/jquery-ui.min.js',
    'js/bootstrap.min.js',
    'js/bootstrap-hover-dropdown.min.js',
    'js/owl.carousel.min.js',
    'js/echo.min.js',
    'js/jquery.easing-1.3.min.js',
    'js/bootstrap-slider.min.js',
    'js/jquery.rateit.min.js',
    'js/lightbox.min.js',
    'js/bootstrap-select.min.js',
    //'js/wow.min.js',
    'js/scripts.js',
    'js/switchstylesheet.js',
  ];
  public $depends = [
    'yii\web\YiiAsset',
    'yii\bootstrap\BootstrapAsset',
  ];

}
