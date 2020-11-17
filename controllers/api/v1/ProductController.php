<?php


namespace app\controllers\api\v1;


use app\models\Product;
use yii\rest\Controller;

class ProductController extends Controller
{
  public function actionList()
  {
    return Product::find()->all();
  }
}