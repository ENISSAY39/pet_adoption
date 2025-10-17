<x-layout>
    <div class="container mx-auto px-6 py-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">All Pets 🐾</h1>
            <a href="{{ route('pets.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md">
                + Add New Pet
            </a>
        </div>

        <!-- Success message -->
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Search and Filter -->
        <div class="search-filters mb-6">
            <form method="GET" action="{{ request()->url() }}" class="space-y-4">
                <!-- Species -->
                <div>
                    <label for="species_id" class="block text-sm font-medium text-gray-700">Species</label>
                    <select name="species_id" id="species_id"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500">
                        <option value="">Toutes</option>
                        @foreach ($species as $s)
                            <option value="{{ $s->id }}" {{ request('species_id') == $s->id ? 'selected' : '' }}>
                                {{ $s->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Age (min & max inputs on the same line) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Âge (années)</label>
                    <div class="mt-2 px-3 py-2 bg-white border border-gray-200 rounded">
                        <div class="flex items-center space-x-3">
                            <div class="w-1/2">
                                <label for="min_age" class="block text-xs text-gray-500">Min</label>
                                <input type="number" name="min_age" id="min_age" min="0" max="100"
                                    value="{{ request('min_age', '') }}"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md"
                                    placeholder="Âge min">
                            </div>

                            <div class="w-1/2">
                                <label for="max_age" class="block text-xs text-gray-500">Max</label>
                                <input type="number" name="max_age" id="max_age" min="0" max="100"
                                    value="{{ request('max_age', '') }}"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md"
                                    placeholder="Âge max">
                            </div>
                        </div>

                        <p class="mt-2 text-xs text-gray-500">Saisissez les âges min et max puis cliquez "Filtrer".
                            Laissez vide pour ignorer.</p>
                    </div>
                </div>

                <!-- Adopted -->
                <div>
                    <label for="adopted" class="block text-sm font-medium text-gray-700">Adopté</label>
                    <select name="adopted" id="adopted"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500">
                        <option value="">Tous</option>
                        <option value="1" {{ request('adopted') === '1' ? 'selected' : '' }}>Oui</option>
                        <option value="0" {{ request('adopted') === '0' ? 'selected' : '' }}>Non</option>
                    </select>
                </div>

                <!-- Actions -->
                <div class="flex space-x-2">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md">
                        Filtrer
                    </button>
                    <a href="{{ request()->url() }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-lg shadow-md">
                        Réinitialiser
                    </a>
                </div>
            </form>
        </div>

        <!-- Empty message -->
        @if ($pets->isEmpty())
            <p class="text-gray-500 text-center text-lg mt-10">No pets here 😿</p>
        @else
            <!-- Table -->
            <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-blue-600 text-white uppercase text-sm">
                        <tr>
                            <th class="py-3 px-4">ID</th>
                            <th class="py-3 px-4">Name</th>
                            <th class="py-3 px-4">Species</th>
                            <th class="py-3 px-4">Breed</th>
                            <th class="py-3 px-4">Age</th>
                            <th class="py-3 px-4">Adopted</th>
                            <th class="py-3 px-4 text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pets as $pet)
                            <tr class="border-b hover:bg-gray-50 transition">
                                <td class="py-3 px-4 font-medium text-gray-700">{{ $pet->id }}</td>
                                <td class="py-3 px-4 text-gray-700">{{ ucfirst($pet->name) }}</td>
                                <td class="py-3 px-4 text-gray-700">
                                    {{ $pet->species->name ?? 'Unknown' }}
                                </td>
                                <td class="py-3 px-4 text-gray-700">{{ ucfirst($pet->breed ?? 'Unknown') }}</td>
                                <td class="py-3 px-4 text-gray-700">{{ $pet->age }} years</td>
                                <td class="py-3 px-4">
                                    @if ($pet->adopted)
                                        <span class="text-green-600 font-semibold">Yes 🐶</span>
                                    @else
                                        <span class="text-red-500 font-semibold">No 😿</span>
                                    @endif
                                </td>

                                <!-- ACTION BUTTONS -->
                                <td class="py-3 px-4 text-center">
                                    <div class="flex justify-center space-x-2">

                                        <!-- View (show) -->
                                        <a href="{{ route('pets.show', $pet->id) }}"
                                            class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm font-medium"
                                            title="View details">
                                            🔍
                                        </a>

                                        <!-- Edit -->
                                        <a href="{{ route('pets.edit', $pet->id) }}"
                                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-sm font-medium"
                                            title="Edit">
                                            ✏️
                                        </a>

                                        <!-- Delete -->
                                        <form action="{{ route('pets.destroy', $pet->id) }}" method="POST"
                                            onsubmit="return confirm('Delete this pet?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm font-medium"
                                                title="Delete">
                                                🗑️
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- pagination --}}
            <div class="mt-4">
                {{ $pets->links() }}
            </div>
        @endif
    </div>
</x-layout>
