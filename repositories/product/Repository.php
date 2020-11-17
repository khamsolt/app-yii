<?php


namespace app\repositories\product;


use app\models\Product;

class Repository extends \app\repositories\Repository implements Contract
{
  public function findById(int $id): Product
  {
    return Product::findOne(['id' => $id]);
  }

  public function all(): array
  {
    return Product::find()->all();
  }
}