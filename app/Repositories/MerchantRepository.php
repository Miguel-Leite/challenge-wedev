<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Merchant;
use App\Models\User;
use App\Repositories\Contracts\MerchantRepositoryInterface;
use Illuminate\Support\Facades\DB;

class MerchantRepository extends AbstractRepository implements MerchantRepositoryInterface
{
  protected $model = Merchant::class;

  public function create(array $data) {
    
    return DB::transaction(function () use ($data) {
        $user = User::create([
          'name'=> $data['name'],
          'email' => $data['email'],
          'password' => $data['password'],
          'is_admin' => true,
        ]);
    
        $merchant = $user->merchant()->create([
            'merchant_name' => $data['name'],
        ]);

        $lastMerchant = Merchant::latest()->first();
        return $lastMerchant;
    });
  }

  public function update(int $id, array $data) {
    
    return DB::transaction(function () use ($id, $data) {
      $merchant = Merchant::find($id);
      $merchant->merchant_name = $data['name'];
      $merchant->save();

      $user = User::find($merchant->admin_id);
      $user->name = $data['name'];
      $user->email = $data['email'];
      $user->password = $data['password'];
      $user->save();

      return $merchant;
    });
  }

  public function delete(int $id) {
    
    return DB::transaction(function () use ($id) {
      $merchant = Merchant::find($id);
      $merchant->delete();
      $user = User::find($merchant->admin_id);
      $user->delete();
      return $merchant;
    });
  }
}
