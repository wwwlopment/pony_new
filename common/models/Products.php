<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $title
 * @property int $category_id
 * @property int $price
 * @property string $vendor
 * @property string $description
 * @property string $image
 * @property int $available
 * @property string $updated_at
 * @property string $created_at
 */
class Products extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'description' => 'Description',
      'title' => 'Title',
      'category_id' => 'Category_id',
      'price' => 'Price',
      'available' => 'Available',
      'vendor' => 'Vendor',
      'image' => 'Image',
      'updated_at' => 'Updated At',
      'created_at' => 'Created At',
    ];
  }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['category_id', 'price', 'available'], 'integer'],
            [['description'], 'string'],
            [['updated_at', 'created_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['vendor', 'image'], 'string', 'max' => 255],

   /**
    Правила. Важно указать. Иначе, данные не сохранятся.
    Я, поставил всем атрибутам правила как безопасные.
    В можете указать любые другие, которые вам необходимы.
    */
        ];
    }




  public function saveImage($filename) {
    $this->image = '../../frontend/web/uploads/'.$filename;
    return $this->save(false);
  }

}