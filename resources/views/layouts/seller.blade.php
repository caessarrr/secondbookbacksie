<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="bg-orange-600 w-64 flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-center h-16 bg-orange-700">
                    <span class="text-white text-lg font-semibold">Seller Dashboard</span>
                </div>
                <ul class="mt-4">
                    <!-- Sidebar items -->
                    <li><a href="#" class="block py-2 px-4 text-white hover:bg-orange-700">Dashboard</a></li>
                    <li><a href="{{ route('seller.stores.index') }}" class="block py-2 px-4 text-white hover:bg-orange-700">Toko</a></li>
                    <li><a href="#" class="block py-2 px-4 text-white hover:bg-orange-700">Orders</a></li>
                    <li><a href="#" class="block py-2 px-4 text-white hover:bg-orange-700">Products</a></li>
                </ul>
            </div>
            <div class="mt-auto">
                <ul>
                    <li><a href="#" class="block py-2 px-4 text-white hover:bg-orange-700">Profile</a></li>
                    <li>
                        <div class="block py-2 px-4 text-white hover:bg-orange-700">

                            <form method="POST" action="{{ route('seller.logout') }}">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Content -->
        <div class="flex-1 p-6">
            <!-- Main Content -->
            <main>
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
