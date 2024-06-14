{{-- resources/views/admin/sellers/create.blade.php --}}

@extends('layouts.admin')

@section('title', 'Tambah Seller Baru')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold mb-4 text-gray-100">Tambah Seller Baru</h1>

    <!-- Form to create a new seller -->
    <form action="{{ route('admin.sellers.store') }}" method="POST" class="w-full max-w-lg bg-gray-800 p-6 rounded-lg">
        @csrf

        <!-- Name Input -->
        <div class="mb-4">
            <label for="name" class="block text-gray-200 text-sm font-bold mb-2">Nama</label>
            <input type="text" id="name" name="name" class="form-input w-full bg-gray-700 border border-gray-600 text-gray-200 rounded py-2 px-3 focus:outline-none focus:border-gray-500" value="{{ old('name') }}" required autofocus>
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email Input -->
        <div class="mb-4">
            <label for="email" class="block text-gray-200 text-sm font-bold mb-2">Email</label>
            <input type="email" id="email" name="email" class="form-input w-full bg-gray-700 border border-gray-600 text-gray-200 rounded py-2 px-3 focus:outline-none focus:border-gray-500" value="{{ old('email') }}" required>
            @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password Input -->
        <div class="mb-4">
            <label for="password" class="block text-gray-200 text-sm font-bold mb-2">Password</label>
            <input type="password" id="password" name="password" class="form-input w-full bg-gray-700 border border-gray-600 text-gray-200 rounded py-2 px-3 focus:outline-none focus:border-gray-500" required>
            @error('password')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <!-- Phone Input -->
        <div class="mb-4">
            <label for="phone" class="block text-gray-200 text-sm font-bold mb-2">Telepon</label>
            <input type="text" id="phone" name="phone" class="form-input w-full bg-gray-700 border border-gray-600 text-gray-200 rounded py-2 px-3 focus:outline-none focus:border-gray-500" value="{{ old('phone') }}">
            @error('phone')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <!-- Address Input -->
        <div class="mb-4">
            <label for="address" class="block text-gray-200 text-sm font-bold mb-2">Alamat</label>
            <textarea id="address" name="address" class="form-textarea w-full bg-gray-700 border border-gray-600 text-gray-200 rounded py-2 px-3 focus:outline-none focus:border-gray-500">{{ old('address') }}</textarea>
            @error('address')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Tambah Seller</button>
            <a href="{{ route('admin.sellers.index') }}" class="text-gray-400 hover:text-gray-200">Batal</a>
        </div>
    </form>
</div>
@endsection
