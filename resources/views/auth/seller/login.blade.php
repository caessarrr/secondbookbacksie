<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Seller</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full p-6 space-y-4 border border-gray-200 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-center text-orange-500">Login Seller</h2>
            <form method="POST" action="{{ route('seller.login.submit') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block">Email:</label>
                    <input type="email" name="email" id="email" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-orange-500">
                </div>
                <div>
                    <label for="password" class="block">Password:</label>
                    <input type="password" name="password" id="password" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-orange-500">
                </div>
                <button type="submit" class="w-full bg-orange-600 text-white py-2 px-4 rounded-md hover:bg-orange-700 transition duration-200">Login</button>
            </form>
            <div class="text-center mt-4">
                <p class="text-sm text-gray-600">Belum punya akun seller? <a href="{{ route('seller.register') }}" class="text-orange-600 hover:text-orange-700">Daftar disini</a></p>
            </div>
        </div>
    </div>
</body>
</html>
