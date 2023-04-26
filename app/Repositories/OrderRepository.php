<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Support\Facades\DB;

class OrderRepository extends AbstractRepository implements OrderRepositoryInterface
{

  protected $model = Order::class;

  public function create(array $data){
    return DB::transaction(function () use ($data) {
      $order = Order::create([
        'user_id' => $data['user_id'],
        'status' => $data['status'],
      ]);

      $order->order_items()->create([
        'order_id' => $order->id,
        'product_id' => $data['product_id'],
        'quantity' => $data['quantity'],
      ]);

      return $order;
    });
  }
  public function update(int $id, array $data){}
  public function delete(int $id){
    return DB::transaction(function () use ($id) {
      $order = Order::find($id);

      $order->order_items()->delete();
      $order->delete();

      return $order;
    });
  }
}
