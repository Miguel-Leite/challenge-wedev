<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory, HasFactory, Notifiable;

  protected $fillable = [
    'name',
    'merchant_id',
    'price',
    'status',
  ];

}
