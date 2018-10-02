<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $buyer_name
 * @property string $buyer_email
 * @property string $buyer_phone
 * @property int $order_amount
 * @property int $status
 * @property string $created_at
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['order_amount'], 'integer'],
            [['buyer_name', 'buyer_email', 'buyer_phone'], 'required'],
            [['created_at'], 'safe'],
            [['buyer_name', 'buyer_email', 'buyer_phone'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',

            'buyer_name' => 'Buyer Name',
            'buyer_email' => 'Buyer Email',
            'buyer_phone' => 'Buyer Phone',
            'order_amount' => 'Order Amount',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
