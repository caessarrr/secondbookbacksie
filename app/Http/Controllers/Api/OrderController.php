<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Services\MidtransService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    protected $midtrans;

    public function __construct(MidtransService $midtrans)
    {
        $this->midtrans = $midtrans;
    }

    public function createOrder(Request $request)
    {
        try {
            // Validasi request dan buat order
            $validator = Validator::make($request->all(), [
                'total_amount' => 'required|numeric',
                'items' => 'required|array',
                'items.*.product_id' => 'required|exists:products,id',
                'items.*.quantity' => 'required|integer|min:1',
                'items.*.price' => 'required|numeric|min:0',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 400);
            }

            // Buat order
            $order = Order::create([
                'customer_id' => $request->user()->id,
                'total_amount' => $request->total_amount,
                'status' => 'pending',
            ]);

            // Pastikan order berhasil dibuat
            if (!$order) {
                throw new \Exception('Failed to create order.');
            }

            // Buat order items
            foreach ($request->items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            // Buat transaksi Midtrans
            $transaction = $this->midtrans->createTransaction($order);

            return response()->json([
                'snap_token' => $transaction->token,
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
