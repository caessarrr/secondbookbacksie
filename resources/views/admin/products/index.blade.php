{{-- resources/views/admin/products/index.blade.php --}}

@extends('layouts.admin')

@section('title', 'Kelola Produk')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold mb-4 text-gray-100">Kelola Produk</h1>

    <!-- Display Success Messages -->
    @if (session('success'))
        <div class="bg-green-100 text-green-700 border border-green-400 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Button to add a new product -->
    <div class="mt-4">
        <a href="{{ route('admin.products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Produk Baru</a>
    </div>

    <!-- Table to display products -->
    <div class="overflow-x-auto mt-5">
        <table class="min-w-full bg-gray-800 text-gray-200">
            <thead>
                <tr class="w-full bg-gray-700 text-left uppercase text-sm">
                    <th class="py-3 px-6">ID</th>
                    <th class="py-3 px-6">Nama</th>
                    <th class="py-3 px-6">Deskripsi</th>
                    <th class="py-3 px-6">Penulis</th>
                    <th class="py-3 px-6">ISBN</th>
                    <th class="py-3 px-6">Harga</th>
                    <th class="py-3 px-6">Stok</th>
                    <th class="py-3 px-6">Kategori</th>
                    <th class="py-3 px-6">Toko</th>
                    <th class="py-3 px-6">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                @foreach ($products as $product)
                    <tr class="border-b border-gray-700 hover:bg-gray-600">
                        <td class="py-3 px-6">{{ $product->id }}</td>
                        <td class="py-3 px-6">{{ $product->name }}</td>
                        <td class="py-3 px-6">{{ $product->description }}</td>
                        <td class="py-3 px-6">{{ $product->author }}</td>
                        <td class="py-3 px-6">{{ $product->isbn }}</td>
                        <td class="py-3 px-6">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="py-3 px-6">{{ $product->stock }}</td>
                        <td class="py-3 px-6">{{ $product->category->name }}</td>
                        <td class="py-3 px-6">{{ $product->store->store_name }}</td>
                        <td class="py-3 px-6 flex">
                            <a href="{{ route('admin.products.show', $product->id) }}" class="text-blue-500 hover:text-blue-300 mx-2">Show</a>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="text-yellow-500 hover:text-yellow-300 mx-2">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-300 mx-2" onclick="return confirm('Anda yakin ingin menghapus produk ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
