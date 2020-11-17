<?php


namespace app\models;


use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int id
 * @property int $status
 * @property int customer_id
 * @property OrderItem[] items
 */
class Order extends ActiveRecord
{
  public const NEW = 1;
  public const PAID = 2;
  public const DEFAULT = 0;

  public static function tableName(): string
  {
    return '{{%orders}}';
  }

  public function getProducts(): ActiveQuery
  {
    return $this->hasMany(Product::class, ['id' => 'product_id'])
      ->viaTable('order_items', ['order_id' => 'id']);
  }

  public function getItems(): ActiveQuery
  {
    return $this->hasMany(OrderItem::class, ['order_id' => 'id']);
  }
}