<?php

namespace App\Http\Controllers;

use App\DTO\Product\ProductDTO;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use App\Interfaces\ProductServiceInterface;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function __construct(
    public ProductServiceInterface $productService
  )
  {}

  public function index()
    {
        return response()->json([
          'data' => $this->productService->getProducts(),
        ]);
    }

  public function getById($id) {
    return response()->json($this->productService->getProductById($id));
  }
    public function create(Request $request)
    {
        $product = new ProductDTO(
          ...$request->only([
            "name",
            "merchant_id",
            "price",
            "status"
        ]));
        $this->productService->create($product);
        return response()->json($product->all());
    }

    public function update(Request $request, int $id)
    {
      $product = new ProductDTO(
        ...$request->only([
        "name",
        "merchant_id",
        "price",
        "status"
      ]));
      $this->productService->update($product, $id);
      return response()->json($product->all());
    }

    public function destroy(int $id)
    {
        $response = $this->productService->delete($id);
        return response()->json($response);
    }
}
