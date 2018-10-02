<?php

use yii\db\Migration;

/**
 * Handles the creation of table `orders`.
 */
class m180713_120600_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('orders', [
            'id' => $this->primaryKey(),
            //'order_id' => $this->integer(11)->defaultValue(0),
            'buyer_name' => $this->string(50)->notNull(),
            'buyer_email' => $this->string(50)->notNull(),
            'buyer_phone' => $this->string(50)->notNull(),
            'order_amount' => $this->integer(11)->defaultValue(0),
            'status'        => $this->smallInteger(1)->defaultValue(0),
            'created_at'  => 'timestamp not null',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('orders');
    }
}
