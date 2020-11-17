<?php


namespace app\seeders;


use app\models\Product;
use Faker\Factory;

class ProductSeeder
{
  public function exec(): void
  {
    $faker = Factory::create('ru');
    for ($i = 0; $i < 20; $i++) {
      $model = new Product();
      $model->name = $faker->text(70);
      $model->price = $faker->randomFloat(2, 10, 1000);
      $model->save();
    }
  }
}