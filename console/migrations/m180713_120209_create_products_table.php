<?php

use yii\db\Migration;

/**
 * Handles the creation of table `products`.
 */
class m180713_120209_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'title'         => $this->string(255)->notNull(),
            'category_id'   => $this->integer(11)->defaultValue(0),
            'price'         => $this->integer(11)->defaultValue(0),
            'vendor'        => $this->string(255),
            'description'   => $this->text()->defaultValue(null),
            'image'         => $this->string(255),
            'available'     => $this->smallInteger(1)->defaultValue(1),
            'updated_at'    => 'timestamp not null default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'created_at'    => 'timestamp not null',
          ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('products');
    }
}
