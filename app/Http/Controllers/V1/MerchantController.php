<?php

namespace App\Http\Controllers\V1;

use App\DTO\Merchant\MerchantDTO;
use App\Http\Controllers\Controller;
use App\Interfaces\MerchantServiceInterface;
use Illuminate\Http\Request;
class MerchantController extends Controller
{
  public function __construct(
    public MerchantServiceInterface $merchantServiceInterface,
  ) {}
  public function index()
  {
    return response()->json([
      "data" => $this->merchantServiceInterface->getMerchants()
    ]);
  }

  public function getById (int $id)
  {
    return response()->json($this->merchantServiceInterface->getMerchantById($id));
  }

  public function create(Request $request)
  {
    $merchant = new MerchantDTO(
      ...$request->only([
        "name",
        "email",
        "password",
      ]),
    );
    $response = $this->merchantServiceInterface->create($merchant);
    return response()->json($response,201);
  }
  public function update(Request $request, int $id)
  {
    $merchant = new MerchantDTO(
      ...$request->only([
        "name",
        "email",
        "password",
      ]),
    );
    $response = $this->merchantServiceInterface->update($merchant, $id);
    return response()->json($response,201);
  }

  public function delete (int $id)
  {
    return response()->json($this->merchantServiceInterface->delete($id));
  }
}
