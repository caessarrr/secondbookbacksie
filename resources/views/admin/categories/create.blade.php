@extends('layouts.admin')

@section('title', 'Tambah Kategori Baru')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold mb-4 text-gray-100">Tambah Kategori Baru</h1>

    <!-- Form untuk menambah kategori baru -->
    <form action="{{ route('admin.categories.store') }}" method="POST" class="w-full max-w-lg bg-gray-800 p-6 rounded-lg">
        @csrf
        
        <!-- Input Nama Kategori -->
        <div class="mb-4">
            <label for="name" class="block text-gray-200 text-sm font-bold mb-2">Nama Kategori:</label>
            <input type="text" id="name" name="name" class="form-input w-full bg-gray-700 border border-gray-600 text-gray-200 rounded py-2 px-3 focus:outline-none focus:border-gray-500" required>
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Tombol Submit -->
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
            <a href="{{ route('admin.categories.index') }}" class="text-gray-400 hover:text-gray-200 bg-gray-700 hover:bg-gray-600 py-2 px-4 rounded">Batal</a>
        </div>
    </form>
</div>
@endsection
