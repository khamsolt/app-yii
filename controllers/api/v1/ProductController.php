<?php


namespace app\controllers\api\v1;


use app\models\Product;
use yii\rest\Controller;

class ProductController extends Controller
{
  public function behaviors(): array
  {
    return [
      'corsFilter' => [
        'class' => \yii\filters\Cors::class,
        'cors' => [
          'Origin' => ['*'],
          'Access-Control-Request-Method' => ['*'],
          'Access-Control-Request-Headers' => ['*'],
          'Access-Control-Allow-Credentials' => false,
          'Access-Control-Max-Age' => 3600,
          'Access-Control-Expose-Headers' => ['*'],
        ],
      ],
    ];
  }

  public function actionItems()
  {
    return Product::find()->all();
  }
}