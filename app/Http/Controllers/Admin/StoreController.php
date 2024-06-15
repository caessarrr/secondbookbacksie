<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Store;

class StoreController extends Controller
{
    public function indexStore()
    {
        $stores = Store::with('seller')->get(); // Memuat relasi seller
        return view('admin.stores.index', compact('stores'));
    }

    public function createStore()
    {
        $sellers = Seller::all(); // Jika membutuhkan daftar seller
        return view('admin.stores.create', compact('sellers'));
    }

    public function storeStore(Request $request)
    {
        $request->validate([
            'store_name' => 'required|string',
            'store_details' => 'required|string',
            'seller_id' => 'required|exists:sellers,id'
        ]);

        Store::create($request->all());
        return redirect()->route('admin.stores.index');
    }

    public function editStore(Store $store)
    {
        $sellers = Seller::all(); // Jika membutuhkan daftar seller
        return view('admin.stores.edit', compact('store', 'sellers'));
    }

    public function updateStore(Request $request, Store $store)
    {
        $store->update($request->all());
        return redirect()->route('admin.stores.index');
    }

    public function destroyStore(Store $store)
    {
        $store->delete();
        return redirect()->route('admin.stores.index');
    }
}
