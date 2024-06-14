@extends('layouts.admin')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold mb-4 text-gray-100">Tambah Toko Baru</h1>

    <form action="{{ route('admin.stores.store') }}" method="POST" class="w-full max-w-lg bg-gray-800 p-6 rounded-lg">
        @csrf

        <!-- Nama Toko -->
        <div class="mb-4">
            <label for="store_name" class="block text-gray-200 text-sm font-bold mb-2">Nama Toko</label>
            <input type="text" id="store_name" name="store_name" class="form-input w-full bg-gray-700 border border-gray-600 text-gray-200 rounded py-2 px-3 focus:outline-none focus:border-gray-500" required autofocus>
        </div>

        <!-- Seller -->
        <div class="mb-4">
            <label for="seller_id" class="block text-gray-200 text-sm font-bold mb-2">Seller</label>
            <select id="seller_id" name="seller_id" class="form-input w-full bg-gray-700 border border-gray-600 text-gray-200 rounded py-2 px-3 focus:outline-none focus:border-gray-500" required>
                @foreach ($sellers as $seller)
                    <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Detail Toko -->
        <div class="mb-4">
            <label for="store_details" class="block text-gray-200 text-sm font-bold mb-2">Detail Toko</label>
            <textarea id="store_details" name="store_details" class="form-textarea w-full bg-gray-700 border border-gray-600 text-gray-200 rounded py-2 px-3 focus:outline-none focus:border-gray-500"></textarea>
        </div>

        <!-- Tombol Simpan dan Batal -->
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
            <a href="{{ route('admin.stores.index') }}" class="text-gray-400 hover:text-gray-200 bg-gray-700 hover:bg-gray-600 py-2 px-4 rounded">Batal</a>
        </div>
    </form>
</div>
@endsection
