<?php

namespace frontend\controllers;

use common\models\Categories;
use common\models\ElasticProducts;
use common\models\Products;
use yii\web\Controller;

class XmlController extends Controller {
  const PAGE_SIZE = 10;

  /**
   * @var string specifies the default action to be 'list'.
   */
  public $defaultAction = 'list';

 public function actionView() {
   var_dump(Categories::find()->count());
/*      $xml = simplexml_load_file('../../frontend/web/uploads/vygr.xml');
    if (!$xml) {
      echo(libxml_get_errors());
      return;
    }
    foreach ($xml->shop->offers->offer as $value) {
      var_dump($value);
    }*/

 }
  public function actionImport() {
    /*'title' => 'Title',
            'category_id' => 'Category ID',
            'price' => 'Price',
            'vendor' => 'Vendor',
            'description' => 'Description',
            'image' => 'Image',
            'available' => 'Available',*/
      libxml_use_internal_errors(true);
    $result='';
      $xml = simplexml_load_file('../../frontend/web/uploads/vygr.xml');
    //  $xml = simplexml_load_file('../../frontend/web/uploads/odyag.xml');
    if (!$xml) {
      echo(libxml_get_errors());
      return;
    }

    if (!Categories::find()->where(['title'=> 'Одяг'])->one()) {
    $category = new Categories();
    $category->title = 'Одяг';
    $category->logo_class = '';
 //   $category->created_at = time();
    $category->save(false);
    $last_id = Categories::find()->count();
      } else {
      $last_id = Categories::find()->count()+1;
  //    echo 'Категорія зайнята';
   //    return;
    }

    foreach ($xml->shop->offers->offer as $value) {
    // var_dump($value);die();


$product = new Products();
$product->title = $value->name;
$product->category_id = $last_id;
$product->price = $value->price;
$product->vendor = $value->vendorCode;
$product->description = $value->description;
$product->image = $value->picture;
$product->available = 1;
//$product->created_at = time();/**/
//
//odyag
/*$description = '';
$product = new Products();
$product->title = $value->model;
$product->category_id = $last_id;
$product->price = $value->price;
$product->vendor = $value->vendor;
foreach ($value->param as $param) {
  $description .= $param . ' ';
      }
$product->description = $description . ' '. $value->description;
$product->image = $value->picture[0];
$product->available = $value->available;*/
//$product->created_at = time();

$product->save(false);



    }
/*
    'title' => 'Title',
            'logo_class' => 'Logo_class',*/





  }
}
