<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
  use HasFactory;
  protected $fillable = [
    'order_id',
    'product_id',
    'quantity',
  ];

  protected $table = 'order_items';

  /**
     * Get the order that owns the order item.
     */
    public function order()
    {
      return $this->belongsTo(Order::class);
    }

    /**
     * Get the product that belongs to the order item.
     */
    public function product()
    {
      return $this->belongsTo(Product::class);
    }
}
