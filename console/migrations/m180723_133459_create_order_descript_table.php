<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order_descript`.
 */
class m180723_133459_create_order_descript_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('order_descript', [
          'id' => $this->primaryKey(),
          'order_id' => $this->integer(11)->defaultValue(0),
          'product_id' => $this->integer(11)->defaultValue(0),
          'quantity' => $this->integer(11)->defaultValue(0),
          'price' => $this->integer(11)->defaultValue(0),
          'created_at'  => 'timestamp not null',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('order_descript');
    }
}
