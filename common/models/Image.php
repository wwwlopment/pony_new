<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property int $id
 * @property int $product_id
 * @property string $image
 * @property string $created_at
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id'], 'integer'],
            [['created_at'], 'safe'],
            [['image'], 'string', 'max' => 255],
          //[['image'], 'file', 'extensions' => 'jpeg, jpg, png, gif', 'maxFiles'=>1000],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'image' => 'Image',
            'created_at' => 'Created At',
        ];
    }

  public function saveImage($filename, $product_id) {
      $this->product_id = $product_id;
    $this->image = '../../frontend/web/uploads/'.$filename;
    return $this->save(false);
  }

}
