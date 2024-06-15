@extends('layouts.admin')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold mb-4 text-gray-100">Tambah Produk Baru</h1>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="w-full max-w-lg bg-gray-800 p-6 rounded-lg">
        @csrf

        <!-- Nama Produk -->
        <div class="mb-4">
            <label for="name" class="block text-gray-200 text-sm font-bold mb-2">Nama Produk</label>
            <input type="text" id="name" name="name" class="form-input w-full bg-gray-700 border border-gray-600 text-gray-200 rounded py-2 px-3 focus:outline-none focus:border-gray-500" required>
        </div>

        <!-- Deskripsi Produk -->
        <div class="mb-4">
            <label for="description" class="block text-gray-200 text-sm font-bold mb-2">Deskripsi</label>
            <textarea id="description" name="description" class="form-textarea w-full bg-gray-700 border border-gray-600 text-gray-200 rounded py-2 px-3 focus:outline-none focus:border-gray-500" required></textarea>
        </div>

        <!-- ISBN Produk -->
        <div class="mb-4">
            <label for="isbn" class="block text-gray-200 text-sm font-bold mb-2">ISBN Produk (Opsional)</label>
            <input type="text" id="isbn" name="isbn" class="form-input w-full bg-gray-700 border border-gray-600 text-gray-200 rounded py-2 px-3 focus:outline-none focus:border-gray-500">
        </div>

        <!-- Harga Produk -->
        <div class="mb-4">
            <label for="price" class="block text-gray-200 text-sm font-bold mb-2">Harga</label>
            <input type="number" id="price" name="price" class="form-input w-full bg-gray-700 border border-gray-600 text-gray-200 rounded py-2 px-3 focus:outline-none focus:border-gray-500" required>
        </div>

        <!-- Stok Produk -->
        <div class="mb-4">
            <label for="stock" class="block text-gray-200 text-sm font-bold mb-2">Stok</label>
            <input type="number" id="stock" name="stock" class="form-input w-full bg-gray-700 border border-gray-600 text-gray-200 rounded py-2 px-3 focus:outline-none focus:border-gray-500" required>
        </div>

        <!-- Kategori Produk -->
        <div class="mb-4">
            <label for="category_id" class="block text-gray-200 text-sm font-bold mb-2">Kategori</label>
            <select id="category_id" name="category_id" class="form-input w-full bg-gray-700 border border-gray-600 text-gray-200 rounded py-2 px-3 focus:outline-none focus:border-gray-500" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Store ID -->
        <div class="mb-4">
            <label for="store_id" class="block text-gray-200 text-sm font-bold mb-2">Store</label>
            <select id="store_id" name="store_id" class="form-input w-full bg-gray-700 border border-gray-600 text-gray-200 rounded py-2 px-3 focus:outline-none focus:border-gray-500" required>
                @foreach ($stores as $store)
                    <option value="{{ $store->id }}">{{ $store->store_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Author Produk -->
        <div class="mb-4">
            <label for="author" class="block text-gray-200 text-sm font-bold mb-2">Author (Opsional)</label>
            <input type="text" id="author" name="author" class="form-input w-full bg-gray-700 border border-gray-600 text-gray-200 rounded py-2 px-3 focus:outline-none focus:border-gray-500">
        </div>

        <!-- Input Gambar Produk -->
        <div class="mb-4">
            <label for="images" class="block text-gray-200 text-sm font-bold mb-2">Gambar Produk</label>
            <input type="file" id="images" name="images[]" multiple class="form-input w-full bg-gray-700 border border-gray-600 text-gray-200 rounded py-2 px-3 focus:outline-none focus:border-gray-500">
        </div>

        <!-- Tombol Simpan -->
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
        </div>
    </form>
</div>
@endsection
