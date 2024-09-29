<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <!-- Login Card -->
        <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-md">
            <!-- Icon and Title -->
            <div class="flex items-center justify-center mb-4">
                <svg class="w-10 h-10 text-purple-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-3.866-3.134-7-7-7S-2 7.134-2 11s3.134 7 7 7c3.866 0 7-3.134 7-7z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.866 3.134 7 7 7s7-3.134 7-7-3.134-7-7-7-7 3.134-7 7z" />
                </svg>
                <h2 class="ml-2 text-2xl font-bold text-gray-800">Login</h2>
            </div>

            <!-- Display Errors -->
            @if ($errors->any())
                <div class="p-4 mb-4 text-red-800 bg-red-200 border border-red-300 rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required />
                    <small class="text-gray-500">Your unique email</small>
                </div>

                <!-- Password Field -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required />
                    <small class="text-gray-500">Your strong password</small>
                    <a href="#" class="float-right text-purple-600 hover:underline">Forgot Password ??</a>
                </div>

                <!-- Login Button -->
                <div class="mb-4">
                    <button type="submit" class="w-full px-4 py-2 text-white bg-purple-500 rounded-lg hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-purple-500">
                        Login
                    </button>
                </div>
            </form>

           
        </div>
    </div>
</body>
</html>
