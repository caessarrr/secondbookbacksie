<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Seller</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full p-6 space-y-4 border border-gray-200 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-center text-orange-500">Register Seller</h2>
            <form method="POST" action="{{ route('seller.register') }}" class="space-y-4">
                @csrf
                <input type="text" name="name" placeholder="Name" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-orange-500">
                <input type="email" name="email" placeholder="Email" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-orange-500">
                <input type="password" name="password" placeholder="Password" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-orange-500">
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-orange-500">
                <button type="submit" class="w-full bg-orange-500 text-white py-2 px-4 rounded-md hover:bg-orange-600 transition duration-200">Register</button>
            </form>
            <div class="text-center mt-4">
                <p class="text-sm text-gray-600">Sudah punya akun seller? <a href="{{ route('seller.login') }}" class="text-orange-600 hover:text-orange-700">Login disini</a></p>
            </div>
        </div>
    </div>
</body>
</html>
