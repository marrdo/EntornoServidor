<x-app-layout>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if($monumentos && $monumentos->count() > 0)
    @php
    $firstMonumento = $monumentos->first();
    $headers = array_keys($firstMonumento->toArray());
    $headers = array_diff($headers, ['created_at', 'updated_at']);
    $monumentos = $monumentos->map(function ($monumento) {
    return $monumento->toArray();
    })->all();
    @endphp

    <x-table :headers="$headers" :rows="$monumentos">
    </x-table>
    @else
    <div class="bg-red-500 text-white p-4">
        <p>No hay monumentos para mostrar.</p>
    </div>
    @endif

</x-app-layout>
