<x-filament::page>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <x-filament::card>
            <h2 class="text-xl font-bold">Selamat datang di Dashboard!</h2>
            <p class="mt-2 text-gray-600">Ini adalah custom dashboard kamu.</p>
        </x-filament::card>

        <x-filament::card>
            <h2 class="text-xl font-bold">Statistik Sederhana</h2>
            <p class="mt-2">Total User: {{ \App\Models\User::count() }}</p>
        </x-filament::card>
    </div>
</x-filament::page>