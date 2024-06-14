@extends('layouts.admin')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold mb-4 text-gray-100">Daftar Toko</h1>
    <a href="{{ route('admin.stores.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Tambah Toko Baru</a>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-800 border border-gray-700">
            <thead>
                <tr class="w-full bg-gray-700 text-left text-gray-200 uppercase text-sm leading-normal">
                    <th class="py-3 px-6">ID</th>
                    <th class="py-3 px-6">Nama Toko</th>
                    <th class="py-3 px-6">Detail</th>
                    <th class="py-3 px-6">Seller</th>
                    <th class="py-3 px-6">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-200 text-sm font-light">
                @foreach ($stores as $store)
                <tr class="border-b border-gray-700 hover:bg-gray-600">
                    <td class="py-3 px-6">{{ $store->id }}</td>
                    <td class="py-3 px-6">{{ $store->store_name }}</td>
                    <td class="py-3 px-6">{{ $store->store_details }}</td>
                    <td class="py-3 px-6">{{ $store->seller->name }}</td>
                    <td class="py-3 px-6">
                        <a href="{{ route('admin.stores.edit', $store->id) }}" class="text-yellow-500 hover:text-yellow-300 mx-2">Edit</a>
                        <form action="{{ route('admin.stores.destroy', $store->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-300 mx-2">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
