<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch orders for the authenticated customer
        $orders = Order::where('user_id', Auth::id())->with('product')->get();

        return response()->json(['data' => $orders], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'product_id' => 'required',
        // ]);

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
        ]);

        return response()->json([
            'success' => true,
            'data' => $order
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Fetch a specific order by ID for the authenticated customer
        $order = Order::where('user_id', Auth::id())->with('product')->find($id);

        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        return response()->json(['data' => $order], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the order and ensure it belongs to the authenticated customer
        $order = Order::where('user_id', Auth::id())->find($id);

        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        // Here, allow updates only if necessary (e.g., updating status, product, etc.)
        $order->update($request->only(['status']));

        return response()->json(['data' => $order, 'message' => 'Order updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the order and ensure it belongs to the authenticated customer
        $order = Order::where('user_id', Auth::id())->find($id);

        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        $order->delete();

        return response()->json(['message' => 'Order canceled successfully'], 200);
    }
}
