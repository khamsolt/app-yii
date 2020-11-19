<?php


namespace app\controllers\api\v1;


use app\models\Order;
use app\services\OrderService;
use yii\rest\Controller;
use yii\web\Request;
use yii\web\User as AuthUser;

class OrderController extends Controller
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

  public function actionCreate(Request $request, OrderService $orderService, AuthUser $user): Order
  {
    return $orderService->create(100, $request->post('productIds'));
  }

  public function actionPay(Request $request, OrderService $orderService): Order
  {
    return $orderService->paid($request->post('orderId'), $request->post('sumPrice'));
  }

  public function actionItems(OrderService $orderService): array
  {
    return $orderService->all(100);
  }
}