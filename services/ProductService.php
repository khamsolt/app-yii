<?php


namespace app\services;


use app\models\Product;
use app\repositories\product\Repository as ProductRepository;

class ProductService
{
  protected ProductRepository $productRepository;

  public function __construct(ProductRepository $productRepository)
  {
    $this->productRepository = $productRepository;
  }

  public function getProducts(): array
  {
    return $this->productRepository->all();
  }

  public function getProduct(int $id): Product
  {
    return $this->productRepository->findById($id);
  }
}