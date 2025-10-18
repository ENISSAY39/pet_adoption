<x-layout>
    <h1 class="text-2xl font-bold mb-4">Edit Pet</h1>

    <form action="{{ route('pets.update', $pet->id) }}" method="POST" class="bg-white p-6 rounded shadow-md space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">Name</label>
            <input type="text" name="name" class="border rounded w-full p-2" value="{{ old('name', $pet->name) }}">
        </div>

        <div>
            <label class="block font-semibold">Species</label>
            <select name="species_id" class="border rounded w-full p-2">
                @foreach ($species as $sp)
                    <option value="{{ $sp->id }}"
                        {{ old('species_id', $pet->species_id) == $sp->id ? 'selected' : '' }}>
                        {{ ucfirst($sp->name) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-semibold">Breed</label>
            <input type="text" name="breed" class="border rounded w-full p-2"
                value="{{ old('breed', $pet->breed) }}">
        </div>

        <div>
            <label class="block font-semibold">Age</label>
            <input type="number" name="age" class="border rounded w-full p-2" value="{{ old('age', $pet->age) }}">
        </div>

        <div class="flex items-center space-x-2">
            <input type="checkbox" name="adopted" id="adopted" value="1" {{ $pet->adopted ? 'checked' : '' }}>
            <label for="adopted" class="font-semibold">Can be adopted</label>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update Pet</button>
    </form>
</x-layout>
