<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AdminLtePluginAsset extends AssetBundle
{
  public $sourcePath = '@vendor/almasaeed2010/adminlte/bower_components';

  public $basePath = '@webroot';
  public $baseUrl = '@web';
  public $js = [
    'js/bootstrap.min.js',
    //'datatables.net-bs/js/dataTables.bootstrap.min.js',
    'https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js',
    // more plugin Js here
  ];
  public $css = [
    'css/bootstrap.min.css',
    //'datatables.net-bs/css/dataTables.bootstrap.css',
    'https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css',
    // more plugin CSS here
  ];
  public $depends = [
    'dmstr\web\AdminLteAsset',
    'yii\bootstrap\BootstrapAsset',
    'yii\web\YiiAsset',
  ];
}
