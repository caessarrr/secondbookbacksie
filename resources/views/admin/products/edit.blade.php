{{-- resources/views/admin/products/edit.blade.php --}}

@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold mb-4 text-gray-100">Edit Produk</h1>

    <!-- Display Validation Errors -->
    @if ($errors->any())
    <div class="bg-red-100 text-red-700 border border-red-400 px-4 py-3 rounded mb-4">
        <strong>Whoops!</strong> Ada masalah dengan data yang dimasukkan. Silakan periksa kembali.
    </div>
    @endif

    <!-- Form untuk Edit Produk -->
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="bg-gray-800 rounded-lg p-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="text-gray-400 block">Nama:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="form-input w-full bg-gray-700 text-gray-200">
        </div>

        <div class="mb-4">
            <label for="description" class="text-gray-400 block">Deskripsi:</label>
            <textarea name="description" id="description" rows="5" class="form-textarea w-full bg-gray-700 text-gray-200">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="author" class="text-gray-400 block">Penulis:</label>
            <input type="text" name="author" id="author" value="{{ old('author', $product->author) }}" class="form-input w-full bg-gray-700 text-gray-200">
        </div>

        <div class="mb-4">
            <label for="isbn" class="text-gray-400 block">ISBN:</label>
            <input type="text" name="isbn" id="isbn" value="{{ old('isbn', $product->isbn) }}" class="form-input w-full bg-gray-700 text-gray-200">
        </div>

        <div class="mb-4">
            <label for="price" class="text-gray-400 block">Harga:</label>
            <input type="text" name="price" id="price" value="{{ old('price', $product->price) }}" class="form-input w-full bg-gray-700 text-gray-200">
        </div>

        <div class="mb-4">
            <label for="stock" class="text-gray-400 block">Stok:</label>
            <input type="text" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" class="form-input w-full bg-gray-700 text-gray-200">
        </div>

        <div class="mb-4">
            <label for="category_id" class="text-gray-400 block">Kategori:</label>
            <select name="category_id" id="category_id" class="form-select w-full bg-gray-700 text-gray-200">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="store_id" class="text-gray-400 block">Toko:</label>
            <select name="store_id" id="store_id" class="form-select w-full bg-gray-700 text-gray-200">
                @foreach ($stores as $store)
                    <option value="{{ $store->id }}" {{ old('store_id', $product->store_id) == $store->id ? 'selected' : '' }}>{{ $store->store_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="images" class="text-gray-400 block">Gambar Produk:</label>
            <input type="file" name="images[]" id="images" multiple class="form-input w-full bg-gray-700 text-gray-200">
        </div>

        <div class="mb-4">
            @if ($product->images)
                <span class="text-gray-400 block">Gambar saat ini:</span>
                <div class="flex flex-wrap">
                    @foreach (json_decode($product->images) as $image)
                        <img src="{{ asset('images/' . $image) }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover rounded-lg mr-2 mb-2">
                    @endforeach
                </div>
            @endif
        </div>

        <div class="flex items-center justify-between mt-6">
            <a href="{{ route('admin.products.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Batal</a>
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
