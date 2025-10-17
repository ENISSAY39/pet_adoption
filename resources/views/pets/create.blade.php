<x-layout>
    <h1 class="text-2xl font-bold mb-4">Add a new pet</h1>

    <form action="{{ route('pets.store') }}" method="POST" class="bg-white p-6 rounded shadow-md space-y-4">
        @csrf

        <div>
            <label for="name" class="block font-semibold">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="border rounded w-full p-2 @error('name') border-red-500 @enderror" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="species" class="block font-semibold">Species</label>
            <input type="text" name="species" id="species" value="{{ old('species') }}"
                class="border rounded w-full p-2 @error('species') border-red-500 @enderror" required>
            @error('species')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="breed" class="block font-semibold">Breed</label>
            <input type="text" name="breed" id="breed" value="{{ old('breed') }}"
                class="border rounded w-full p-2 @error('breed') border-red-500 @enderror">
            @error('breed')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="age" class="block font-semibold">Age</label>
            <input type="number" name="age" id="age" value="{{ old('age') }}"
                class="border rounded w-full p-2 @error('age') border-red-500 @enderror" required>
            @error('age')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center space-x-2">
            <input type="checkbox" name="adopted" id="adopted" value="1" {{ old('adopted') ? 'checked' : '' }}>
            <label for="adopted" class="font-semibold">Adopted</label>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create</button>
    </form>
</x-layout>
