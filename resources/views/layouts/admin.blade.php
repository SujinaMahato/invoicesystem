<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body class="bg-white text-gray-900">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-purple-500 h-screen px-4 py-6">
            <div class="text-center mb-6">
                <img src="{{ asset('path-to-logo.png') }}" alt="Logo" class="mx-auto h-10">
            </div>
            <ul>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="block text-white py-2 px-4 hover:bg-purple-400">Dashboard</a>
                </li>
                
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6 bg-white">
            @yield('content')
        </div>
    </div>
</body>
</html>
