<?php

namespace App\Http\Controllers\V1;

use App\DTO\Product\ProductDTO;
use App\Http\Controllers\Controller;
use App\Interfaces\ProductServiceInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function __construct(
    public ProductServiceInterface $productServiceInterface,
  ) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return response()->json($this->productServiceInterface->getProducts());
    }

    public function getById(int $id)
    {
      return response()->json($this->productServiceInterface->getProductById($id));
    }

    public function create(Request $request)
    {
      $productDTO = new ProductDTO(...$request->only([
        'name',
        'price',
      ]));
      return response()->json($this->productServiceInterface->create($productDTO));
    }


    public function update(Request $request, $id)
    {
      $productDTO = new ProductDTO(...$request->only([
        'name',
        'price',
        'status',
      ]));
      return response()->json($this->productServiceInterface->update($productDTO, $id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(int $id)
    {
      $this->productServiceInterface->delete($id);
      return response()->json(['success' => true]);
    }
}
