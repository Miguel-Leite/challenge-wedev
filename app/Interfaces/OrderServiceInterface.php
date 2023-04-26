<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\DTO\Order\OrderDTO;

interface OrderServiceInterface
{
  public function getOrders();
  public function getOrderById(int $id);
  public function create(OrderDTO $orderDTO);
  public function update(OrderDTO $orderDTO, int $id);
  public function delete(int $id);
}
