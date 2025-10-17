<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Adoption</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-900 min-h-screen">

    <nav class="bg-white shadow mb-8">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold">🐾 Pet Adoption</h1>
            <div class="flex items-center gap-4">
                <a href="{{ route('pets.index') }}" class="hover:underline">Home</a>
                <a href="{{ route('pets.create') }}" class="hover:underline">Add Pet</a>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6">
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-600 text-white rounded">{{ session('success') }}</div>
        @endif

        {{ $slot ?? '' }}
        @yield('content')
    </main>

</body>

</html>
