<?php


namespace app\models;


use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int order_id
 * @property int product_id
 * @property float price
 */
class OrderItem extends ActiveRecord
{
  public static function tableName(): string
  {
    return '{{%order_items}}';
  }

  public function getOrder(): ActiveQuery
  {
    return $this->hasOne(Order::class, ['id' => 'order_id']);
  }

  public function getProduct(): ActiveQuery
  {
    return $this->hasOne(Product::class, ['id' => 'product_id']);
  }
}