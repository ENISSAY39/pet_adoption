<x-layout>
    <h1 class="text-2xl font-bold mb-4">Ajouter un nouvel animal</h1>

    <form action="{{ route('pets.store') }}" method="POST" class="bg-white p-6 rounded shadow-md space-y-4">
        @csrf

        <div>
            <label for="name" class="block font-semibold">Name</label>
            <input type="text" name="name" id="name" class="border rounded w-full p-2" required>
        </div>

        <div>
            <label for="species" class="block font-semibold">Species</label>
            <input type="text" name="species" id="species" class="border rounded w-full p-2" required>
        </div>

        <div>
            <label for="age" class="block font-semibold">Age</label>
            <input type="number" name="age" id="age" class="border rounded w-full p-2" required>
        </div>

        <div>
            <label for="breed" class="block font-semibold">Breed</label>
            <input type="text" name="breed" id="breed" class="border rounded w-full p-2" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Create
        </button>
    </form>
</x-layout>
