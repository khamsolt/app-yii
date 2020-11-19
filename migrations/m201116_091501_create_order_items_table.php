<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_items}}`.
 */
class m201116_091501_create_order_items_table extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->createTable('{{%order_items}}', [
      'id' => $this->primaryKey(),
      'order_id' => $this->integer()->notNull(),
      'product_id' => $this->integer()->notNull(),
      'price' => $this->money()->notNull(),
      'status' => $this->tinyInteger()->null()
    ]);

    $this->addForeignKey(
      'fk_order_items_order_id',
      'order_items',
      'order_id',
      'orders',
      'id'
    );

    $this->addForeignKey(
      'fk_order_items_product_id',
      'order_items',
      'product_id',
      'products',
      'id'
    );
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropForeignKey('fk_order_items_order_id', 'order_items');
    $this->dropForeignKey('fk_order_items_product_id', 'order_items');
    $this->dropTable('{{%order_items}}');
  }
}
