<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $title
 * @property string $logo_class
 * @property string $updated_at
 * @property string $created_at
 */
class Categories extends \yii\db\ActiveRecord
{
/*  public function behaviors()
  {
    return [
      TimestampBehavior::className(),
    ];
  }*/
/*
  public function behaviors()
  {
    return [
      // Other behaviors
      [
        'class' => TimestampBehavior::className(),
        'created_at' => 'time_created',
        'updated_at' => false,
        'value' => new Expression('NOW()'),
      ],
    ];
  }*/

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['id','updated_at', 'created_at'], 'safe'],
            [['title'], 'string', 'max' => 50],
            [['logo_class'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'logo_class' => 'Logo_class',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }
}
