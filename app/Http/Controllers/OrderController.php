<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $orders = Order::query()->paginate(10);
        return response()->json(['orders' => $orders]);
    }

    public function store(OrderRequest $request)
    {
        $order = Order::query()->create($request->all());
        return response()->json(['order' => $order]);
    }

    public function show($id)
    {
        $order = Order::query()->findOrFail($id);
        return response()->json(['order' => $order]);
    }

    public function update(OrderUpdateRequest $request, $id)
    {
        $order = Order::query()->findOrFail($id)->update($request->all());
        return response()->json(['order' => $order]);
    }

    public function destroy($id)
    {
        Order::query()->findOrFail($id)->delete();
        return response(['message' => 'OK'], 200);
    }

}
