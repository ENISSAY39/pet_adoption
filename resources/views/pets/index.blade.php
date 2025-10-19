<x-layout>
    <x-slot name="title">Pets Catalog</x-slot>

    <h1 class="text-3xl font-bold text-green-700 mb-6 flex items-center gap-2">
        All Pets 🐾
    </h1>

    <!-- FILTRES -->
    <form method="GET" action="{{ route('pets.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <!-- Species -->
        <div>
            <label for="species_id" class="block text-sm font-medium text-gray-700 mb-1">Species</label>
            <select name="species_id" id="species_id"
                class="w-full rounded-lg border-gray-300 focus:ring-green-500 focus:border-green-500">
                <option value="">All species</option>
                @foreach ($species as $s)
                    <option value="{{ $s->id }}" {{ request('species_id') == $s->id ? 'selected' : '' }}>
                        {{ $s->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Age min/max -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Age (years)</label>
            <div class="flex gap-2">
                <input type="number" name="min_age" placeholder="Min" value="{{ request('min_age') }}"
                    class="w-1/2 rounded-lg border-gray-300 focus:ring-green-500 focus:border-green-500">
                <input type="number" name="max_age" placeholder="Max" value="{{ request('max_age') }}"
                    class="w-1/2 rounded-lg border-gray-300 focus:ring-green-500 focus:border-green-500">
            </div>
        </div>

        <!-- Adopted -->
        <div>
            <label for="adopted" class="block text-sm font-medium text-gray-700 mb-1">Can be adopted</label>
            <select name="adopted" id="adopted"
                class="w-full rounded-lg border-gray-300 focus:ring-green-500 focus:border-green-500">
                <option value="">All</option>
                <option value="1" {{ request('adopted') == '1' ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ request('adopted') == '0' ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <!-- Buttons -->
        <div class="flex items-end gap-2">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow">
                Filter
            </button>
            <a href="{{ route('pets.index') }}"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg shadow">
                Reset
            </a>
        </div>
    </form>

    <!-- BOUTON AJOUT -->
    <div class="flex justify-end mb-4">
        <a href="{{ route('pets.create') }}"
            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow">
            + Add a pet
        </a>
    </div>

    <!-- TABLEAU -->
    <div class="overflow-x-auto rounded-lg shadow">
        <table class="w-full text-left border-collapse">
            <thead class="bg-green-600 text-white">
                <tr>
                    <th class="py-3 px-4">ID</th>
                    <th class="py-3 px-4">Name</th>
                    <th class="py-3 px-4">Species</th>
                    <th class="py-3 px-4">Breed</th>
                    <th class="py-3 px-4">Age</th>
                    <th class="py-3 px-4">Can Be Adopted</th>
                    <th class="py-3 px-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pets as $pet)
                    <tr class="odd:bg-white even:bg-green-50 border-b">
                        <td class="py-3 px-4">{{ $pet->id }}</td>
                        <td class="py-3 px-4 font-semibold">{{ $pet->name }}</td>
                        <td class="py-3 px-4">{{ $pet->species->name ?? '—' }}</td>
                        <td class="py-3 px-4">{{ $pet->breed }}</td>
                        <td class="py-3 px-4">{{ $pet->age }} years</td>
                        <td class="py-3 px-4">
                            @if ($pet->adopted)
                                <span class="text-green-700 font-semibold">Yes</span>
                            @else
                                <span class="text-red-600 font-semibold">No</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 flex justify-center gap-2">
                            <a href="{{ route('pets.show', $pet) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg">👁️</a>
                            <a href="{{ route('pets.edit', $pet) }}"
                                class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-lg">✏️</a>
                            <form action="{{ route('pets.destroy', $pet) }}" method="POST"
                                onsubmit="return confirm('Delete this pet?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="py-6 px-4 text-center text-gray-600">No pets found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- PAGINATION -->
    <div class="mt-6 flex flex-col md:flex-row items-center justify-between gap-4">
        <!-- Texte -->
        <div class="text-sm text-gray-600">
            @if ($pets->total() > 0)
                Showing <strong>{{ $pets->firstItem() }}</strong> to <strong>{{ $pets->lastItem() }}</strong> of
                <strong>{{ $pets->total() }}</strong> results
            @else
                No pets found.
            @endif
        </div>

        <!-- Liens de pagination -->
        @if ($pets->hasPages())
            <div class="flex justify-center">
                <nav role="navigation" aria-label="Pagination" class="inline-flex rounded-md shadow-sm">
                    {{-- Précédente --}}
                    @if ($pets->onFirstPage())
                        <span
                            class="px-3 py-2 text-gray-400 bg-gray-100 border border-gray-300 rounded-l-md cursor-not-allowed">‹</span>
                    @else
                        <a href="{{ $pets->previousPageUrl() }}" rel="prev"
                            class="px-3 py-2 text-green-700 bg-white border border-gray-300 hover:bg-green-100 rounded-l-md">‹</a>
                    @endif

                    {{-- Liens des pages --}}
                    @foreach ($pets->links()->elements[0] ?? [] as $page => $url)
                        @if ($page == $pets->currentPage())
                            <span
                                class="px-3 py-2 bg-green-600 text-white border border-green-600">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}"
                                class="px-3 py-2 text-green-700 bg-white border border-gray-300 hover:bg-green-100">{{ $page }}</a>
                        @endif
                    @endforeach

                    {{-- Suivante --}}
                    @if ($pets->hasMorePages())
                        <a href="{{ $pets->nextPageUrl() }}" rel="next"
                            class="px-3 py-2 text-green-700 bg-white border border-gray-300 hover:bg-green-100 rounded-r-md">›</a>
                    @else
                        <span
                            class="px-3 py-2 text-gray-400 bg-gray-100 border border-gray-300 rounded-r-md cursor-not-allowed">›</span>
                    @endif
                </nav>
            </div>
        @endif
    </div>
</x-layout>
