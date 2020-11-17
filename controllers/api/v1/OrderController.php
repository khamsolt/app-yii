<?php


namespace app\controllers\api\v1;


use app\models\Order;
use app\services\OrderService;
use yii\filters\AccessControl;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\Controller;
use yii\web\Request;
use yii\web\User as AuthUser;

class OrderController extends Controller
{
  public function behaviors()
  {
    $behaviors = parent::behaviors();
    $behaviors ['access'] = [
      'class' => AccessControl::class,
      'rules' => [
        [
          'allow' => true,
          'roles' => ['@'],
        ],
      ]
    ];
    $behaviors['authenticator'] = [
      'class' => CompositeAuth::class,
      'authMethods' => [
        HttpBasicAuth::class,
        HttpBearerAuth::class,
        QueryParamAuth::class,
      ],
    ];
    return $behaviors;
  }

  public function actionCreate(Request $request, OrderService $orderService, AuthUser $user): Order
  {
    return $orderService->create($user->getId(), $request->get('productId'));
  }

  public function actionPay(Request $request, OrderService $orderService): Order
  {
    return $orderService->paid($request->post('orderId'), $request->post('price'));
  }
}