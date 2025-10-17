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
        @endif
    </div>
</x-layout>
