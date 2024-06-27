@extends('layouts.seller')

@section('content')
    <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-lg">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Dashboard</h2>
        <p class="text-gray-600">Selamat datang di Seller Dashboard, {{ auth()->guard('seller')->user()->name }}.</p>
    </div>
@endsection
