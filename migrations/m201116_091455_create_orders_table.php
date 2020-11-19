<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 */
class m201116_091455_create_orders_table extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->createTable('{{%orders}}', [
      'id' => $this->primaryKey(),
      'customer_id' => $this->integer()->notNull(),
      'status' => $this->tinyInteger()
        ->notNull()
        ->defaultValue(0),
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable('{{%orders}}');
  }
}
