@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold mb-4 text-gray-100">Edit Kategori</h1>

    <!-- Form untuk mengedit kategori -->
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="w-full max-w-lg bg-gray-800 p-6 rounded-lg">
        @csrf
        @method('PUT')

        <!-- Input Nama Kategori -->
        <div class="mb-4">
            <label for="name" class="block text-gray-200 text-sm font-bold mb-2">Nama Kategori:</label>
            <input type="text" id="name" name="name" class="form-input w-full bg-gray-700 border border-gray-600 text-gray-200 rounded py-2 px-3 focus:outline-none focus:border-gray-500" value="{{ $category->name }}" required>
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Tombol Submit -->
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
            <a href="{{ route('admin.categories.index') }}" class="text-gray-400 hover:text-gray-200 bg-gray-700 hover:bg-gray-600 py-2 px-4 rounded">Batal</a>
        </div>
    </form>
</div>
@endsection
