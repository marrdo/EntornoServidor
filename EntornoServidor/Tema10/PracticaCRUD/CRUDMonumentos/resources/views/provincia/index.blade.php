<x-app-layout>

    @php
    // Obtener el primer elemento del array de provincias
    $firstProvince = $provincias->first();

    // Obtener los nombres de las columnas
    $headers = array_keys($firstProvince->toArray());
    // foreach ($firstProvince->toArray() as $key => $value) {
    // echo $key.' value: '.$value.'<br />';
    // }

    // Eliminar las columnas created_at y updated_at del array de headers
    $headers = array_diff($headers, ['created_at', 'updated_at']);

    // Convertir la colección de provincias en un array de arrays
    $provincias = $provincias->map(function ($provincia) {
    return $provincia->toArray();
    })->all();

    // el método map() para iterar sobre la colección de provincias 
    // y convertir cada objeto Provincia en un array asociativo 
    // utilizando el método toArray(). Luego, usamos el método all() 
    // para obtener un array plano que contiene todas las filas de la tabla.
    @endphp

    {{-- @foreach ($headers as $header)
    {{ $header }}
    @endforeach --}}
    <div class="flex justify-center items-center h-screen mt-10">
    <x-table :headers="$headers" :rows="$provincias">
    </x-table>
</div>

</x-app-layout>
