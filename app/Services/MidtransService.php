<?php

namespace App\Services;

use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Order;

class MidtransService
{
    public function __construct()
    {
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function createTransaction(Order $order)
    {
        // Pastikan $order tidak null dan memiliki ID sebelum digunakan
        if (!$order || !$order->id) {
            throw new \Exception('Invalid order provided.');
        }

        $transactionDetails = [
            'order_id' => $order->id,
            'gross_amount' => $order->total_amount,
        ];

        $itemDetails = [];
        foreach ($order->orderItems as $item) {
            $itemDetails[] = [
                'id' => $item->product_id,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'name' => $item->product->name,
            ];
        }

        $customerDetails = [
            'first_name' => $order->customer->name,
            'email' => $order->customer->email,
        ];

        $transaction = [
            'transaction_details' => $transactionDetails,
            'item_details' => $itemDetails,
            'customer_details' => $customerDetails,
        ];

        return Snap::createTransaction($transaction);
    }


}
