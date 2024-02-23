<div wire:poll.5s class="mt-10 mx-5 md:mx-20 relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm  text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            Monumentos de Andalucía
            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">En esta sección podemos ver, crear, modificar o eliminar los monumento que tenemos en neustra Andalucía.</p>
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Ciudad
                </th>
                <th scope="col" class="px-6 py-3">
                    Aforo
                </th>
                <th scope="col" class="px-6 py-3">
                    Telefono
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Acciones</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($monumentos as $monumento)
                <livewire:fila :monumento="$monumento" wire:key="filaMonumento_{{$monumento->id}}"/>
            @endforeach
        </tbody>
    </table>
</div>
