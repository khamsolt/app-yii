<?php


namespace app\repositories\order;


use app\models\Order;

class Repository extends \app\repositories\Repository implements Contract
{
  public function findById(int $id): Order
  {
    return Order::findOne(['id' => $id]);
  }

  public function all(int $userId): array
  {
    return Order::find()
      ->where(['orders.customer_id' => $userId])
      ->with('products')
      ->all();
  }
}