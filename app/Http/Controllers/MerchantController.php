<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoremerchantRequest;
use App\Http\Requests\UpdatemerchantRequest;
use App\Interfaces\MerchantServiceInterface;
use App\Models\merchant;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoremerchantRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(merchant $merchant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(merchant $merchant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemerchantRequest $request, merchant $merchant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(merchant $merchant)
    {
        //
    }
}
