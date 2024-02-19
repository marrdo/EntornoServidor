
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
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
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{-- Nombre --}}{{$monumento->nombre}}
                </th>
                <td class="px-6 py-4">
                    {{-- Ciudad --}}{{$monumento->provincias->nombre}}
                </td>
                <td class="px-6 py-4">
                    {{-- Aforo --}}{{$monumento->aforo}}
                </td>
                <td class="px-6 py-4">
                    {{-- Telefono --}}{{$monumento->phone->numero}}
                </td>
                <td class="px-6 py-4 text-right">
                    {{-- <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> --}}
                    {{-- Acciones --}} <button>Actualizar</button> <button wire:click="delete" type="button">Eliminar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


