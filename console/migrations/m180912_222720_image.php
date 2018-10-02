<?php

use yii\db\Migration;

/**
 * Class m180912_222720_image
 */
class m180912_222720_image extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

      $this->createTable('image', [
        'id' => $this->primaryKey(),
        'product_id' => $this->integer(11)->defaultValue(0),
        'image' => $this->string(255),
        'created_at'  => 'timestamp not null',
      ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180912_222720_image cannot be reverted.\n";

        return false;
    }

}
