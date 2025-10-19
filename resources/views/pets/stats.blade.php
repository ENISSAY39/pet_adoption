<x-layout>
    <h1 class="text-3xl font-bold text-center text-green-700 mb-6">🐾 Pet Statistics</h1>

    <!-- Tableau -->
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6 mb-10">
        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-green-600 text-white">
                <tr>
                    <th class="py-2 px-4 text-left">Species</th>
                    <th class="py-2 px-4 text-left">Adopted</th>
                    <th class="py-2 px-4 text-left">Not Adopted</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stats as $species)
                    <tr class="border-b text-center">
                        <td class="py-2 px-4 font-semibold">{{ $species->name }}</td>
                        <td class="py-2 px-4 text-green-600">{{ $species->adopted_count }}</td>
                        <td class="py-2 px-4 text-red-600">{{ $species->not_adopted_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Graphique -->
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold text-center text-teal-700 mb-4">📊 Adoption Overview</h2>
        <canvas id="petStatsChart" height="120"></canvas>
    </div>

    <!-- CDN Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Script du graphique -->
    <script>
        const ctx = document.getElementById('petStatsChart').getContext('2d');
        const petStatsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($stats->pluck('name')),
                datasets: [{
                        label: 'Adopted',
                        data: @json($stats->pluck('adopted_count')),
                        backgroundColor: 'rgba(34, 197, 94, 0.7)', // vert Tailwind
                        borderColor: 'rgba(34, 197, 94, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Not Adopted',
                        data: @json($stats->pluck('not_adopted_count')),
                        backgroundColor: 'rgba(0, 0, 255, 0.7)', // rouge Tailwind
                        borderColor: 'rgba(239, 68, 68, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            color: '#374151', // gris-700
                            font: {
                                size: 14
                            }
                        }
                    },
                    title: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#374151'
                        },
                        grid: {
                            color: '#e5e7eb'
                        }
                    },
                    x: {
                        ticks: {
                            color: '#374151'
                        },
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    </script>
</x-layout>
