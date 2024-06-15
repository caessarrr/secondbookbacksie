{{-- resources/views/admin/products/show.blade.php --}}

@extends('layouts.admin')

@section('title', 'Detail Produk')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold mb-4 text-gray-100">Detail Produk</h1>

    <div class="bg-gray-800 rounded-lg p-6">

        <div class="mb-4">
            <span class="text-gray-400">ID:</span>
            <p class="text-gray-200">{{ $product->id }}</p>
        </div>

        <div class="mb-4">
            <span class="text-gray-400">Nama:</span>
            <p class="text-gray-200">{{ $product->name }}</p>
        </div>

        <div class="mb-4">
            <span class="text-gray-400">Deskripsi:</span>
            <p class="text-gray-200">{{ $product->description }}</p>
        </div>

        <div class="mb-4">
            <span class="text-gray-400">Penulis:</span>
            <p class="text-gray-200">{{ $product->author }}</p>
        </div>

        <div class="mb-4">
            <span class="text-gray-400">ISBN:</span>
            <p class="text-gray-200">{{ $product->isbn }}</p>
        </div>

        <div class="mb-4">
            <span class="text-gray-400">Harga:</span>
            <p class="text-gray-200">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
        </div>

        <div class="mb-4">
            <span class="text-gray-400">Stok:</span>
            <p class="text-gray-200">{{ $product->stock }}</p>
        </div>

        <div class="mb-4">
            <span class="text-gray-400">Kategori:</span>
            <p class="text-gray-200">{{ $product->category->name }}</p>
        </div>

        <div class="mb-4">
            <span class="text-gray-400">Toko:</span>
            <p class="text-gray-200">{{ $product->store->store_name }}</p>
        </div>

        <div class="mb-4">
            <span class="text-gray-400">Gambar Produk:</span>
            <div class="flex flex-wrap">
                @foreach (json_decode($product->images) as $image)
                    <img src="{{ asset('images/' . $image) }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover rounded-lg mr-2 mb-2">
                @endforeach
            </div>
        </div>

        <div class="mb-4">
            <span class="text-gray-400">Tanggal Dibuat:</span>
            <p class="text-gray-200">{{ optional($product->created_at)->format('d M Y') }}</p>
        </div>

        <div class="mb-4">
            <span class="text-gray-400">Tanggal Diperbarui:</span>
            <p class="text-gray-200">{{ optional($product->updated_at)->format('d M Y') }}</p>
        </div>

        <div class="flex items-center justify-between mt-4">
            <a href="{{ route('admin.products.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Kembali ke Daftar Produk</a>
            <a href="{{ route('admin.products.edit', $product->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit Produk</a>
        </div>

    </div>
</div>
@endsection
