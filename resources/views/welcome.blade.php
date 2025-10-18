<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Pet Catalog Manager</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-br from-green-50 to-emerald-100 text-gray-800 min-h-screen flex flex-col">

    <!-- Centered Navbar -->
    <nav class="bg-gradient-to-r from-green-600 to-teal-500 p-6 text-white shadow-md">
        <div class="max-w-6xl mx-auto flex items-center justify-center relative">
            <!-- Bigger site title -->
            <h1 class="text-5xl md:text-6xl font-extrabold tracking-wide flex items-center gap-3 drop-shadow-sm">
                🐾 Pet Catalog Manager
            </h1>

            </a>
        </div>
    </nav>

    <!-- Main content -->
    <main class="flex-1 flex flex-col justify-center items-center text-center px-6">
        <!-- Welcome section -->
        <div class="flex flex-col justify-center items-center mb-12">
            <h2 class="text-4xl md:text-5xl font-bold text-green-700 mb-4 leading-tight">
                Welcome to the Pet Catalog manager 🐶🐱🐦
            </h2>


            <a href="{{ route('pets.index') }}"
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg shadow-lg text-lg font-semibold transition duration-200">
                See The list of Available Pets
            </a>
        </div>

        <!-- Section title -->
        <h3 class="text-2xl md:text-3xl font-semibold text-green-700 mb-8 flex items-center gap-2">
            Here are the available species 🐾 :
        </h3>

        <!-- Row of images -->
        <div class="flex flex-col sm:flex-row justify-center items-center gap-10 mb-16 flex-wrap">
            <!-- Dog -->
            <div class="flex flex-col items-center">
                <img src="{{ asset('images/animals/dog.jpg') }}" alt="Dog"
                    class="w-64 h-64 md:w-80 md:h-80 object-cover rounded-full shadow-lg border-4 border-white hover:scale-105 transition-transform duration-300">
                <p class="mt-3 text-lg md:text-xl font-medium text-green-700">Dog</p>
            </div>

            <!-- Cat -->
            <div class="flex flex-col items-center">
                <img src="{{ asset('images/animals/cat.jpg') }}" alt="Cat"
                    class="w-64 h-64 md:w-80 md:h-80 object-cover rounded-full shadow-lg border-4 border-white hover:scale-105 transition-transform duration-300">
                <p class="mt-3 text-lg md:text-xl font-medium text-green-700">Cat</p>
            </div>

            <!-- Bird -->
            <div class="flex flex-col items-center">
                <img src="{{ asset('images/animals/bird.jpg') }}" alt="Bird"
                    class="w-64 h-64 md:w-80 md:h-80 object-cover rounded-full shadow-lg border-4 border-white hover:scale-105 transition-transform duration-300">
                <p class="mt-3 text-lg md:text-xl font-medium text-green-700">Bird</p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-center text-sm text-gray-600 py-6">
        © {{ date('Y') }} Pet catalog manager |Yassine's Laravel Project 🐾
    </footer>

</body>

</html>
