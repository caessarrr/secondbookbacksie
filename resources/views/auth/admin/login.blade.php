<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">
    <div class="container mx-auto mt-20">
        <div class="flex justify-center">
            <div class="w-full max-w-md">
                <div class="bg-gray-800 shadow-md rounded-lg overflow-hidden">
                    <div class="bg-gray-900 px-6 py-4">
                        <h2 class="text-white text-xl font-semibold">Admin Login</h2>
                    </div>
                    <div class="px-6 py-4">
                        <form method="POST" action="{{ route('admin.login.submit') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="email" class="block text-gray-400">E-Mail Address</label>
                                <input id="email" type="email" class="w-full px-3 py-2 bg-gray-700 text-white rounded-md @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="block text-gray-400">Password</label>
                                <input id="password" type="password" class="w-full px-3 py-2 bg-gray-700 text-white rounded-md @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <div class="flex items-center">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" class="h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="ml-2 block text-gray-400" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md">
                                    Login
                                </button>
                            </div>

                            @if (Route::has('password.request'))
                                <div class="text-center">
                                    <a class="text-indigo-400 hover:text-indigo-500" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tailwind JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
</body>
</html>
