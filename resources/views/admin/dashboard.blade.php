@extends('layouts.admin')

@section('content')
    <div class="container mx-auto mt-24">
        <div class="flex justify-center">
            <div class="w-full max-w-md">
                <div class="bg-gray-800 shadow-md rounded-lg overflow-hidden ml-5">
                    <div class="bg-gray-900 px-6 py-4">
                        <h2 class="text-white text-xl font-semibold">{{ __('Admin Dashboard') }}</h2>
                    </div>
                    <div class="px-6 py-4">
                        @auth('admin')
                            @if (Auth::guard('admin')->check())
                                <p class="text-white">Welcome, {{ Auth::guard('admin')->user()->name }}!</p>
                                <p class="text-gray-400">What would you like to manage?</p>
                            @else
                                <p class="text-red-500">Error: Unable to retrieve authenticated admin user.</p>
                            @endif
                        @else
                            <p class="text-white">Welcome!</p>
                        @endauth
                        <!-- Add other content as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
