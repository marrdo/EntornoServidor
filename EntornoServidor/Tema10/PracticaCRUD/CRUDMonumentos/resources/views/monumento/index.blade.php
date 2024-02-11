<x-app-layout>
    <!-- Comprobamos si hay un mensaje de éxito en la sesión y lo mostramos -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Comprobamos si hay monumentos y si su cantidad es mayor que cero -->
    @if(!empty($monumentos))
    @php
    // Obtener el primer monumento de la colección
    $firstMonumento = $monumentos->first();

    // Obtener las claves (nombres de las columnas) del primer monumento y convertirlas en un array
    $headers = array_keys($firstMonumento->toArray());
    // Esto obtiene las claves (nombres de las columnas) del primer monumento de la colección y las convierte en un array.

    // Eliminar del array de nombres de columnas las claves que no queremos mostrar en la tabla (id, created_at, updated_at)
    $headers = array_diff($headers, ['id', 'created_at', 'updated_at']);
    // Esto elimina del array de nombres de columnas las claves que no queremos mostrar en la tabla (como 'id', 'created_at' y 'updated_at')

    // Definimos una función para obtener el nombre de la provincia a partir de su ID
    function obtenerNombreProvincia($idProvincia, $provincias) {
    foreach ($provincias as $provincia) {
    // Iteramos sobre el array de provincias y comparamos los IDs
    if ($provincia['id'] === $idProvincia) {
    return $provincia['nombre']; // Si encontramos la provincia, devolvemos su nombre
    }
    }
    return 'Jamaica'; // Si no encontramos la provincia, devolvemos una cadena
    }

    // Mapeamos los monumentos y cambiamos el valor de 'provincia' por el nombre de la provincia
    $monumentos = $monumentos->map(function ($monumento) use ($provincias) {
    // Utilizamos la función definida anteriormente para obtener el nombre de la provincia
    $monumento['provincia'] = obtenerNombreProvincia($monumento['provincia'], $provincias);
    // Devolvemos solo las tres primeras columnas de cada monumento
    return array_slice($monumento->toArray(), 1, 3);
    })->all();
    @endphp

    <!-- Mostramos una tabla con los monumentos -->
    <x-table :headers="$headers" :rows="$monumentos">
    </x-table>

    <section>
        <h2>Listado de Json</h2>
        <ul id="lista-monumentos"></ul>
    </section>
    

    {{-- <script>
        // Imprimir los datos JSON de monumentos
        var monumentosData = {
            !!json_encode($monumentos) !!
        };
        console.log('Datos de monumentos en formato JSON:');
        console.log(monumentosData);

        // Imprimir los datos JSON de provincias
        var provinciasData = {
            !!json_encode($provincias) !!
        };
        console.log('Datos de provincias en formato JSON:');
        console.log(provinciasData);

    </script> --}}
    <script>
        // Datos JSON de monumentos
        var monumentosData = {!! $monumentos_json !!};

        // Función para mostrar monumentos en el DOM
        function mostrarMonumentos() {
            var listaMonumentos = document.getElementById('lista-monumentos');

            // Limpiamos la lista antes de agregar nuevos elementos
            listaMonumentos.innerHTML = '';

            // Iteramos sobre los datos JSON y creamos elementos de lista para cada monumento
            monumentosData.forEach(monumento => {
                var listItem = document.createElement('li');
                listItem.textContent = `-/ ${monumento.nombre} - Aforo: ${monumento.aforo}`;
                listaMonumentos.appendChild(listItem);
            });
        }

        // Mostrar los monumentos cuando se carga la página
        document.addEventListener('DOMContentLoaded', function() {
            mostrarMonumentos();
        });
    </script>

    @else
    <!-- Mostramos un mensaje si no hay monumentos para mostrar -->
    <section class="bg-red-500 text-white p-4">
        <p>No hay monumentos para mostrar.</p>
    </section>
    @endif
</x-app-layout>
