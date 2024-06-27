@extends('layouts.seller')

@section('content')

    <div class="px-4 py-6">

        <h1 class="text-2xl font-semibold mb-4">Your Store</h1>

        @if ($store)

            <h2>{{ $store->store_name }}</h2>
            <p>{{ $store->store_details }}</p>
            <a href="#" class="text-blue-600 hover:underline">View Store</a>

        @else

            <p>No store found.</p>

        @endif

    </div>

@endsection
