<?php


namespace common\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model{

  public $image;
  public $currentImage;

  public function rules() {

   return [
     [['image'], 'required'],
     [['image'], 'file', 'extensions' => 'jpg, png, jpeg'],

   ];
  }

  public function uploadFile(UploadedFile $file, $currentImage='78')
  {
    $this->image = $file;
    if ($this->validate()) {
        $this->deleteCurrentImage($currentImage);

    return $this->saveImage();

    }
  }

  private function getFolder() {
    return '../../frontend/web/uploads/';
  }

  private function generateFilename() {
    return strtolower(md5(uniqid($this->image->baseName)) . '.' . $this->image->extension);
  }

  public function deleteCurrentImage($currentImage) {
    if ($this->fileExists($currentImage)) {
      unlink($this->getFolder() . $currentImage);
    }
  }

  public function fileExists($currentImage) {
    if(!empty($currentImage) && $currentImage != null) {
      return file_exists($this->getFolder() . $currentImage);
    }
  }

  public function saveImage() {
    $filename = $this->generateFilename();

    $this->image->saveAs($this->getFolder() . $filename);

    return $filename;
  }

}