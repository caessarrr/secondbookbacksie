<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Auth;
use App\Models\Seller;
use App\Models\Store;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.admin.login');
    }

    public function login(Request $request)
    {
        // Validasi permintaan login
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // Jika berhasil login
            return redirect()->intended('/admin/dashboard');
        } else {
            // Jika gagal login
            return redirect()->back()->withInput($request->only('email'))->withErrors([
                'email' => 'These credentials do not match our records.',
            ]);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function showSellers()
    {
        $sellers = Seller::all();
        return view('admin.sellers.index', compact('sellers'));
    }

    public function createSeller()
    {
        return view('admin.sellers.create');
    }

    public function storeSeller(Request $request)
    {
        $seller = Seller::create($request->all());
        return redirect()->route('admin.sellers.index');
    }

    public function editSeller(Seller $seller)
    {
        return view('admin.sellers.edit', compact('seller'));
    }

    public function updateSeller(Request $request, Seller $seller)
    {
        $seller->update($request->all());
        return redirect()->route('admin.sellers.index');
    }

    public function deleteSeller(Seller $seller)
    {
        $seller->delete();
        return redirect()->route('admin.sellers.index');
    }

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
