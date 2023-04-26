<?php

namespace App\Http\Controllers\V1;

use App\DTO\Order\OrderDTO;
use App\Http\Controllers\Controller;
use App\Interfaces\OrderServiceInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function __construct(
    private OrderServiceInterface $orderServiceInterface,
  ) {}

  public function index()
  {
    return response()->json($this->orderServiceInterface->getOrders());
  }

  public function getById(int $id)
  {
    return response()->json($this->orderServiceInterface->getOrderById($id));
  }


  public function create(Request $request)
  {
    $orderDTO = new OrderDTO(...$request->all());
    return response()->json($this->orderServiceInterface->create($orderDTO),201);
  }

  public function update (Request $request, int $id)
  {
    $orderDTO = new OrderDTO(
      ...$request->only(
      "user_id",
      "product_id",
      "quantity"
    ));

    return response()->json($this->orderServiceInterface->update($orderDTO, $id));
  }

  public function destroy(int $id)
  {
    return response()->json($this->orderServiceInterface->delete($id));
  }
}
