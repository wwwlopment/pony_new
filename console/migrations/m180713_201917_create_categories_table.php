<?php

use yii\db\Migration;

/**
 * Handles the creation of table `categories`.
 */
class m180713_201917_create_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'title'       => $this->string(50)->notNull(),
            'logo_class'       => $this->string(50)->notNull(),
            'updated_at'    => 'timestamp not null default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'created_at'    => 'timestamp not null',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('categories');
    }
}
