<?php


namespace app\repositories\order;


use app\models\Order;

interface Contract
{
  public function findById(int $id): Order;

  public function all(int $userId): array;
}