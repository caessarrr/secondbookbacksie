<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::all();
        return response()->json($stores);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'store_name' => 'required|string|max:255',
            'store_details' => 'required|string',
        ]);

        $store = Store::create($validated);
        return response()->json($store, 201);
    }

    public function show(Store $store)
    {
        return response()->json($store);
    }

    public function update(Request $request, Store $store)
    {
        $validated = $request->validate([
            'store_name' => 'required|string|max:255',
            'store_details' => 'required|string',
        ]);

        $store->update($validated);
        return response()->json($store);
    }

    public function destroy(Store $store)
    {
        $store->delete();
        return response()->json(null, 204);
    }
}
