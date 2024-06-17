<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        $sellers = Seller::all();
        return response()->json($sellers);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:sellers,email',
        ]);

        $seller = Seller::create($validated);
        return response()->json($seller, 201);
    }

    public function show(Seller $seller)
    {
        return response()->json($seller);
    }

    public function update(Request $request, Seller $seller)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:sellers,email,' . $seller->id,
        ]);

        $seller->update($validated);
        return response()->json($seller);
    }

    public function destroy(Seller $seller)
    {
        $seller->delete();
        return response()->json(null, 204);
    }
}
