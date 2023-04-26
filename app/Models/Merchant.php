<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'is_admin',
    'email',
    'password',
  ];

  public function user() {
    return $this->belongsTo(User::class);
  }
}
