<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller;


class SellerController extends Controller
{
    public function indexSellers()
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
        // Handle profile photo upload and update
        if ($request->hasFile('profile_photo')) {
            $profilePhoto = $request->file('profile_photo');
            $profilePhotoName = time() . '_' . $profilePhoto->getClientOriginalName();
            $profilePhoto->move(public_path('profile_photos'), $profilePhotoName);
            $data['profile_photo'] = $profilePhotoName;
        }

        $seller = Seller::create($request->all());
        return redirect()->route('admin.sellers.index');
    }

    public function editSeller(Seller $seller)
    {
        return view('admin.sellers.edit', compact('seller'));
    }

    public function updateSeller(Request $request, Seller $seller)
    {
        // Handle profile photo upload and update
        if ($request->hasFile('profile_photo')) {
            $profilePhoto = $request->file('profile_photo');
            $profilePhotoName = time() . '_' . $profilePhoto->getClientOriginalName();
            $profilePhoto->move(public_path('profile_photos'), $profilePhotoName);
            $data['profile_photo'] = $profilePhotoName;
        }

        $seller->update($request->all());
        return redirect()->route('admin.sellers.index');
    }

    public function destroySeller(Seller $seller)
    {
        $seller->delete();
        return redirect()->route('admin.sellers.index');
    }
}
