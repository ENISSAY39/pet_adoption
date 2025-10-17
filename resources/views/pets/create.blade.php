<x-layout>
    <h1 class="text-2xl font-bold mb-4">Add a New Pet 🐾</h1>

    <form action="{{ route('pets.store') }}" method="POST" class="bg-white p-6 rounded shadow-md space-y-4">
        @csrf

        <div>
            <label class="block font-semibold">Name</label>
            <input type="text" name="name" class="border rounded w-full p-2" value="{{ old('name') }}">
        </div>

        <div>
            <label class="block font-semibold">Species</label>
            <select name="species_id" class="border rounded w-full p-2">
                <option value="">-- Choose a species --</option>
                @foreach ($species as $sp)
                    <option value="{{ $sp->id }}" {{ old('species_id') == $sp->id ? 'selected' : '' }}>
                        {{ ucfirst($sp->name) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-semibold">Breed</label>
            <input type="text" name="breed" class="border rounded w-full p-2" value="{{ old('breed') }}">
        </div>

        <div>
            <label class="block font-semibold">Age</label>
            <input type="number" name="age" class="border rounded w-full p-2" value="{{ old('age') }}">
        </div>

        <div class="flex items-center space-x-2">
            <input type="checkbox" name="adopted" id="adopted" value="1">
            <label for="adopted" class="font-semibold">Adopted</label>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Create Pet</button>
    </form>
</x-layout>
