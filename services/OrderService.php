<?php


namespace app\services;


use app\models\Order;
use app\models\OrderItem;
use app\repositories\order\Contract as OrderRepository;
use yii\base\Component;

class OrderService extends Component
{
  private ProductService $productService;
  private OrderRepository $orderRepository;

  public function __construct(ProductService $productService, OrderRepository $orderRepository, $config = [])
  {
    parent::__construct($config);
    $this->productService = $productService;
    $this->orderRepository = $orderRepository;
  }

  public function create(int $customerId, array $productIds): Order
  {
    $order = new Order();
    $order->status = Order::NEW;
    $order->customer_id = $customerId;
    $order->save();
    array_walk($productIds, fn($productId) => $this->createItem($order->id, $productId)->save());
    return $order;
  }

  private function createItem(int $orderId, int $productId): OrderItem
  {
    $product = $this->productService->getProduct($productId);
    $orderItem = new OrderItem();
    $orderItem->order_id = $orderId;
    $orderItem->product_id = $product->id;
    $orderItem->price = $product->price;
    return $orderItem;
  }

  public function paid(int $orderId, float $price): Order
  {
    $sum = .0;
    $order = $this->orderRepository->findById($orderId);
    foreach ($order->products as $item) {
      $sum += $item->price;
    }
    if ($sum === $price && $order->status === Order::NEW && $this->checkPaidService()) {
      $order->status = Order::PAID;
      $order->save();
    }
    return $order;
  }

  private function checkPaidService(): bool
  {
    $info = file_get_contents('https://ya.ru');
    return true;
  }

  public function all(int $userId): array
  {
    return $this->orderRepository->all($userId);
  }
}