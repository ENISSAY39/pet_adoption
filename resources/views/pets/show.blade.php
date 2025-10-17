<x-layout>
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md mt-10">
        <h1 class="text-3xl font-bold mb-4 text-center">{{ $pet->name }}</h1>

        <ul class="space-y-2 text-gray-700">
            <li><strong>Species:</strong> {{ ucfirst($pet->species) }}</li>
            <li><strong>Breed:</strong> {{ ucfirst($pet->breed) }}</li>
            <li><strong>Age:</strong> {{ $pet->age }} years</li>
            <li><strong>Adopted:</strong> {{ $pet->adopted ? 'Yes 🐾' : 'No ❌' }}</li>
        </ul>

        <div class="flex justify-between mt-6">
            <a href="{{ route('pets.edit', $pet->id) }}"
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                ✏️ Edit
            </a>

            <form action="{{ route('pets.destroy', $pet->id) }}" method="POST"
                onsubmit="return confirm('Are you sure you want to delete this pet?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                    🗑 Delete
                </button>
            </form>
        </div>

        <div class="text-center mt-6">
            <a href="{{ route('pets.index') }}" class="text-blue-600 hover:underline">← Back to list</a>
        </div>
    </div>
</x-layout>
