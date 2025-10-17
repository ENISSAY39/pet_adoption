<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Adoption</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-800">

    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between">
            <h1 class="font-bold text-lg">🐾 Pet Adoption</h1>
            <div class="space-x-4">
                <a href="{{ route('pets.index') }}" class="hover:underline">Accueil</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto mt-6 px-4">
        {{ $slot }}
    </main>

</body>

</html>
