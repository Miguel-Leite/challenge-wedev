<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  use HasFactory;
  protected $fillable = [
    'user_id',
    'status',
  ];

   /**
   * Get the merchant record associated with the user.
   */
  public function order_items()
  {
    return $this->hasMany(OrderItem::class, 'order_id');
  }
}
