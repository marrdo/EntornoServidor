
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
            {{-- Prueba con form --}}
            <form action="" >
                
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" >
                    <td scope="row" class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap dark:text-white ">
                        {{-- Nombre --}}
                        <input class="text-black" value="{{$monumento->nombre}}" type="text" wire:model="nombre_{{$monumento->id}}" />
                        {{$monumento->nombre}}
                    </td>
                    <td class="px-6 py-4">
                        {{-- Ciudad --}}
                        {{$monumento->provincias->nombre}}
                    </td>
                    <td class="px-6 py-4">
                        {{-- Aforo --}}
                        <input class="text-black" value="{{$monumento->aforo}}" type="number" wire:model="aforo_{{$monumento->id}}" />
                        {{$monumento->aforo}}
                    </td>
                    <td class="px-6 py-4">
                        {{-- Telefono --}}
                        {{-- @isset($monumento->phone)
                            @isset($monumento->phone->numero)
                                {{$monumento->phone->numero}}
                            @endisset
                        @endisset --}}
                        {{$monumento->phone ? $monumento->phone->numero : 'NoPhone'}}
                        // IdEmpleado:
                        {{$monumento->user->id}}
                    </td>
                    <td class="px-6 py-4 text-right">
                        {{-- Acciones --}}
                        <button type="button" wire:click="update({{$monumento->id}})">click</button>
                        {{-- @livewire('edit-btn') --}}
                        <button wire:click="destroy({{$monumento->id}})" type="button" class="text-white my-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-blue-800 dark:focus:ring-gray-100">Eliminar</button>
                    </td>
                </tr>
            </form>
            @endforeach
        </tbody>
    </table>    
</div>


