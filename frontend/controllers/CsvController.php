<?php


namespace frontend\controllers;


use Yii;

class CsvController extends Controller {

  //...

  /**
   * Импорт товаров из csv файла
   */
  public function actionImport() {
    //путь к файлу
    $this->pathToFile = Yii::getPathOfAlias('webroot') . '/path/to/file.csv';
    //файл можно загрузить с помощью формы

    if (!file_exists($this->pathToFile) || !is_readable($this->pathToFile)) {
      //... код, если файл отсутствует
    }
    $data = array();
    if (($handle = fopen($this->pathToFile, 'r')) !== false) {
      $i = 0;
      while (($row = fgetcsv($handle, 1000, $this->delimiter)) !== false) {
  /*      $model = new Goods();
        $model->name = $row[0];
        $model->article = $row[1];
        $model->cost = $row[2];
        $model->description = $row[3];
        $model->count = $row[4];
        $model->producer = $row[5];
        if ($model->validate()) {
          $model->save();
        } else {
          //... код в случае ошибки сохранения
        }*/
      }
      fclose($handle);
    }
    //... код после импорта
  }

  //... код






}