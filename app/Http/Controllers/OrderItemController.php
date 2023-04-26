<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storeorder_itemRequest;
use App\Http\Requests\Updateorder_itemRequest;
use App\Models\order_item;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Storeorder_itemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(order_item $order_item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(order_item $order_item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateorder_itemRequest $request, order_item $order_item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(order_item $order_item)
    {
        //
    }
}
