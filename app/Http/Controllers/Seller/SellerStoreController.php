<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;

class SellerStoreController extends Controller
{
    /**
     * Menampilkan daftar toko seller.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexStore()
    {
        // Ambil data toko dari seller yang sedang login
        $store = auth()->guard('seller')->user()->store;

        // Jika seller memiliki toko, kirimkan ke view
        if ($store) {
            return view('seller.stores.index', compact('store'));
        } else {
            // Jika seller tidak memiliki toko, tampilkan pesan atau lakukan aksi yang sesuai
            return view('seller.stores.index')->with('error', 'Seller has no store yet.');
        }
    }

    /**
     * Menampilkan form untuk mengedit detail toko.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function editStore(Store $store)
    {
        // Memastikan seller hanya dapat mengedit toko miliknya sendiri
        if ($store->seller_id !== auth()->user()->id) {
            abort(403); // Unauthorized access
        }

        return view('seller.stores.edit', compact('store'));
    }

    /**
     * Menyimpan perubahan yang dibuat pada toko.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function updateStore(Request $request, Store $store)
    {
        // Validasi data input
        $request->validate([
            'store_name' => 'required|string|max:255',
            'store_details' => 'nullable|string',
        ]);

        // Memastikan seller hanya dapat mengedit toko miliknya sendiri
        if ($store->seller_id !== auth()->user()->id) {
            abort(403); // Unauthorized access
        }

        // Update data toko
        $store->update([
            'store_name' => $request->store_name,
            'store_details' => $request->store_details,
        ]);

        return redirect()->route('seller.stores.index')
                         ->with('success', 'Store has been updated successfully.');
    }
}
