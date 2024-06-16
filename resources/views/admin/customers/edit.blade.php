@extends('layouts.admin')

@section('title', 'Edit Customer')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold mb-4 text-gray-100">Edit Customer</h1>

    <!-- Form to edit an existing customer -->
    <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST" class="w-full max-w-lg bg-gray-800 p-6 rounded-lg">
        @csrf
        @method('PUT')

        <!-- Name Input -->
        <div class="mb-4">
            <label for="name" class="block text-gray-200 text-sm font-bold mb-2">Nama</label>
            <input type="text" id="name" name="name" class="form-input w-full bg-gray-700 border border-gray-600 text-gray-200 rounded py-2 px-3 focus:outline-none focus:border-gray-500" value="{{ old('name', $customer->name) }}" required autofocus>
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email Input -->
        <div class="mb-4">
            <label for="email" class="block text-gray-200 text-sm font-bold mb-2">Email</label>
            <input type="email" id="email" name="email" class="form-input w-full bg-gray-700 border border-gray-600 text-gray-200 rounded py-2 px-3 focus:outline-none focus:border-gray-500" value="{{ old('email', $customer->email) }}" required>
            @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <!-- Phone Input -->
        <div class="mb-4">
            <label for="phone" class="block text-gray-200 text-sm font-bold mb-2">Telepon</label>
            <input type="text" id="phone" name="phone" class="form-input w-full bg-gray-700 border border-gray-600 text-gray-200 rounded py-2 px-3 focus:outline-none focus:border-gray-500" value="{{ old('phone', $customer->phone) }}">
            @error('phone')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <!-- Address Input -->
        <div class="mb-4">
            <label for="address" class="block text-gray-200 text-sm font-bold mb-2">Alamat</label>
            <textarea id="address" name="address" class="form-textarea w-full bg-gray-700 border border-gray-600 text-gray-200 rounded py-2 px-3 focus:outline-none focus:border-gray-500">{{ old('address', $customer->address) }}</textarea>
            @error('address')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Customer</button>
            <a href="{{ route('admin.customers.index') }}" class="text-gray-400 hover:text-gray-200 bg-gray-700 hover:bg-gray-600 py-2 px-4 rounded">Batal</a>
        </div>
    </form>
</div>
@endsection
