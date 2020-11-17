<?php


namespace app\repositories\product;


use app\models\Product;

interface Contract
{
  public function findById(int $id): Product;

  public function all(): array;
}