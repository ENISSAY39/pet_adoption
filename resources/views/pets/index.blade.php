<x-layout>
    <div class="container mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Liste des animaux </h1>
            <a href="{{ route('pets.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md">
                + Ajouter un animal
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($pets as $pet)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-200">
                    <img src="{{ $pet->image ? asset('storage/' . $pet->image) : 'https://placehold.co/600x400' }}"
                        alt="{{ $pet->name }}" class="w-full h-48 object-cover">

                    <div class="p-4">
                        <h2 class="text-xl font-semibold text-gray-800">{{ $pet->name }}</h2>
                        <p class="text-gray-600">Species : {{ ucfirst($pet->species) }}</p>
                        <p class="text-gray-600">Race : {{ ucfirst($pet->breed) }}</p>
                        <p class="text-gray-600">Âge : {{ $pet->age }} ans</p>

                        <div class="flex justify-between items-center mt-4">
                            <a href="{{ route('pets.update', $pet->id) }}"
                                class="bg-yellow-400 hover:bg-yellow-500 text-white py-1 px-3 rounded-lg text-sm font-medium">
                                ✏️ Edit
                            </a>

                            <form action="{{ route('pets.destroy', $pet->id) }}" method="POST"
                                onsubmit="return confirm('Supprimer cet animal ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-lg text-sm font-medium">
                                    🗑 Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 col-span-full text-center">Aucun animal enregistré pour le moment.</p>
            @endforelse
        </div>
    </div>
</x-layout>
