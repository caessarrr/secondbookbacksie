{{-- resources/views/admin/sellers/index.blade.php --}}

@extends('layouts.admin')

@section('title', 'Kelola Seller')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold mb-4 text-gray-100">Kelola Seller</h1>

    <!-- Display Success Messages -->
    @if (session('success'))
        <div class="bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-200 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Table to display sellers -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-800 border border-gray-700">
            <thead>
                <tr class="w-full bg-gray-700 text-left text-gray-200 uppercase text-sm leading-normal">
                    <th class="py-3 px-6">#</th>
                    <th class="py-3 px-6">Name</th>
                    <th class="py-3 px-6">Email</th>
                    <th class="py-3 px-6">Phone</th>
                    <th class="py-3 px-6">Address</th>
                    <th class="py-3 px-6">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-200 text-sm font-light">
                @foreach ($sellers as $seller)
                    <tr class="border-b border-gray-700 hover:bg-gray-600">
                        <td class="py-3 px-6">{{ $seller->id }}</td>
                        <td class="py-3 px-6">{{ $seller->name }}</td>
                        <td class="py-3 px-6">{{ $seller->email }}</td>
                        <td class="py-3 px-6">{{ $seller->phone }}</td>
                        <td class="py-3 px-6">{{ $seller->address }}</td>
                        <td class="py-3 px-6 flex">
                            <a href="{{ route('admin.sellers.edit', $seller->id) }}" class="text-yellow-500 hover:text-yellow-300 mx-2">Edit</a>
                            <form action="{{ route('admin.sellers.delete', $seller->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-300 mx-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Button to add a new seller -->
    <div class="mt-4">
        <a href="{{ route('admin.sellers.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add New Seller</a>
    </div>
</div>
@endsection
