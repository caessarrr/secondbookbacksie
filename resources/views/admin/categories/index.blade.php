@extends('layouts.admin')

@section('title', 'Kelola Kategori')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold mb-4 text-gray-100">Kelola Kategori</h1>

    <!-- Tombol untuk menambahkan kategori baru -->
    <div class="mt-4">
        <a href="{{ route('admin.categories.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Kategori Baru</a>
    </div>

    <!-- Tabel untuk menampilkan kategori -->
    <div class="overflow-x-auto mt-5">
        <table class="min-w-full bg-gray-800 border border-gray-700">
            <thead>
                <tr class="w-full bg-gray-700 text-left text-gray-200 uppercase text-sm leading-normal">
                    <th class="py-3 px-6">ID</th>
                    <th class="py-3 px-6">Nama Kategori</th>
                    <th class="py-3 px-6">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-200 text-sm font-light">
                @foreach ($categories as $category)
                    <tr class="border-b border-gray-700 hover:bg-gray-600">
                        <td class="py-3 px-6">{{ $category->id }}</td>
                        <td class="py-3 px-6">{{ $category->name }}</td>
                        <td class="py-3 px-6 flex">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="text-yellow-500 hover:text-yellow-300 mx-2">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline-block">
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
