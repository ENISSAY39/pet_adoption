<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Adoption</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-800">

    <nav class="bg-gradient-to-r from-green-600 to-teal-500 p-4 text-white flex justify-between items-center shadow-md">
        <div class="container mx-auto flex justify-between">
            <h1 class="text-3xl md:text-4xl font-extrabold tracking-wide flex items-center gap-3 drop-shadow-sm">🐾 Pet
                Catalog Manager </h1>



            <div class="flex items-center space-x-1">
                <a href="{{ route('welcome') }}"
                    class="text-3xl md:text-4xl font-extrabold tracking-wide flex items-center gap-3 drop-shadow-sm">Home</a>
                <span class="text-lg">|</span>
                <a href="{{ route('pets.index') }}"
                    class="text-3xl md:text-4xl font-extrabold tracking-wide flex items-center gap-3 drop-shadow-sm">Catalog</a>
            </div>

        </div>
    </nav>

    <main class="container mx-auto mt-6 px-4">
        {{ $slot }}
    </main>

    <footer class="text-center text-sm text-gray-600 py-6">
        © {{ date('Y') }} Pet catalog manager | Yassine's Laravel Project 🐾
    </footer>

</body>

</html>
