<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\Order\OrderDTO;
use App\Interfaces\OrderServiceInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;

class OrderService implements OrderServiceInterface
{
  public function __construct(
    private OrderRepositoryInterface $orderRepository,
  ) {}
  public function getOrders() {
    return $this->orderRepository->all();
  }
  public function getOrderById(int $id) {
    return $this->orderRepository->find($id);
  }
  public function create(OrderDTO $orderDTO) {
    $data = $orderDTO->toArray();
    $data['user_id'] = auth()->user()->id;
    return $this->orderRepository->create($data);
  }
  public function update(OrderDTO $orderDTO, int $id) {
    $data = $orderDTO->all();
    $data['user_id'] = auth()->user()->id;
    return $this->orderRepository->update($id, $data);
  }
  public function delete(int $id) {
    return $this->orderRepository->delete($id);
  }
}
