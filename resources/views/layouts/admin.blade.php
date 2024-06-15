<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-size: .875rem;
        }

        .sidebar {
            width: 250px; /* Adjust sidebar width */
        }

        .main-content {
            margin-left: 250px; /* Adjust margin to account for sidebar width */
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: static;
                margin-bottom: 1rem;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body class="bg-gray-900 text-white">

    <header>
        <!-- Navbar Header -->
        <nav class="bg-gray-800 fixed top-0 w-full z-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <a class="text-white text-xl font-bold" href="#">Admin Panel</a>
                    </div>
                    <div class="hidden sm:block">
                        <div class="flex items-center">
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Logout</a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="flex flex-col sm:flex-row">
        <div class="bg-gray-800 sidebar flex-shrink-0 sm:fixed sm:top-16 sm:bottom-0 sm:left-0 sm:overflow-y-auto">
            <div class="sidebar-sticky py-4">
                <ul class="nav flex flex-col space-y-1">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-400 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.sellers.index') }}" class="text-gray-400 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md">Kelola Seller</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.stores.index') }}" class="text-gray-400 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md">Kelola Toko</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.categories.index') }}" class="text-gray-400 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md">Kelola Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.products.index') }}" class="text-gray-400 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md">Kelola Produk</a>
                    </li>
                </ul>
            </div>
        </div>

        <main role="main" class="main-content flex-1 p-4 sm:ml-64 mt-16">
            @yield('content')
        </main>
    </div>

    <!-- Tailwind JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
</body>
</html>
