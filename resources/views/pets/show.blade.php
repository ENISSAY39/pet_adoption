<x-layout>
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md mt-10">
        <h1 class="text-3xl font-bold mb-4 text-center">{{ $pet->name }}</h1>

        <ul class="text-gray-700 text-center space-y-2">
            <li><strong>Species:</strong> {{ $pet->species->name ?? 'Unknown' }}</li>
            <li><strong>Breed:</strong> {{ $pet->breed }}</li>
            <li><strong>Age:</strong> {{ $pet->age }} years</li>
            <li><strong>Adopted:</strong> {{ $pet->adopted ? 'Yes' : 'No' }}</li>
        </ul>

        <div class="flex justify-between mt-6">
            <a href="{{ route('pets.edit', $pet->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">✏️ Edit</a>
            <form action="{{ route('pets.destroy', $pet->id) }}" method="POST"
                onsubmit="return confirm('Delete this pet?')">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 text-white px-4 py-2 rounded">🗑 Delete</button>
            </form>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('pets.index') }}" class="text-blue-600 hover:underline">← Back</a>
        </div>
    </div>
</x-layout>
