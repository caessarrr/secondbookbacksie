<?php

namespace App\Http\Controllers\Seller\Auth;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\Store; // Tambahkan model Store
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SellerAuthController extends Controller
{
    /**
     * Show the registration form for sellers.
     *
     * @return \Illuminate\View\View
     */
    public function showRegisterForm()
    {
        return view('auth.seller.register');
    }

    /**
     * Store a newly created seller in storage after registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:sellers',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $seller = Seller::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Setelah seller berhasil diregistrasi, redirect ke halaman login atau lainnya
        return redirect()->route('seller.login')->with('success', 'Registration successful. Please login.');
    }

    /**
     * Show the login form for sellers.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.seller.login');
    }

    /**
     * Handle a seller login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('seller')->attempt($credentials)) {
            // Jika login berhasil, cek apakah seller sudah memiliki toko
            $seller = Auth::guard('seller')->user();

            if (!$seller->store) {
                // Jika seller belum memiliki toko, buat toko baru
                Store::create([
                    'seller_id' => $seller->id,
                    'store_name' => 'Default Store Name', // Ganti dengan nama default jika perlu
                    'store_details' => 'Default Store Description', // Ganti dengan deskripsi default jika perlu
                ]);
            }

            // Redirect ke dashboard atau halaman lainnya setelah login
            return redirect()->route('seller.dashboard');
        }

        // Jika login gagal, kembalikan dengan pesan error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    /**
     * Logout the seller.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('seller')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

