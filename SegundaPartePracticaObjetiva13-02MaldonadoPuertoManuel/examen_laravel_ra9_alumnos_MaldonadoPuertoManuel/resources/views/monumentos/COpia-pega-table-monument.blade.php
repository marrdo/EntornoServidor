<div wire:poll.5s class="mt-10 mx-5 md:mx-20 relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm  text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            Monumentos de Andalucía
            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">En esta sección podemos ver, crear, modificar o eliminar los monumento que tenemos en neustra Andalucía.</p>
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    __{{Nombre}}
                </th>
                <th scope="col" class="px-6 py-3">
                    __{{Ciudad}}
                </th>
                <th scope="col" class="px-6 py-3">
                    __{{Aforo}}
                </th>
                <th scope="col" class="px-6 py-3">
                    __{{Telefono}}
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Acciones</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($monumentos as $monumento)
            <tr wire:key="fila-{{$monumento->id}}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td scope="row" class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap dark:text-white ">
                    {{-- Nombre --}}
                    <input class="text-black" type="text" wire:model="nombre" />
                    {{$monumento->nombre}}
                </td>
                <td class="px-6 py-4">
                    {{-- Ciudad --}}
                    {{$monumento->provincias->nombre}}
                    <label for="provincia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona la provincia</label>
                    <select wire:model="provincia" id="provincia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected>Selecciona una provincia</option>
                        @foreach($provincias as $provincia)
                        <option value="{{$provincia->id}}">{{$provincia->abreviatura}} -- {{$provincia->nombre}}</option>
                        @endforeach
                    </select>
                </td>
                <td class="px-6 py-4">
                    {{-- Aforo --}}
                    <input class="text-black" type="number" wire:model="aforo" />
                    {{$monumento->aforo}}
                </td>
                <td class="px-6 py-4">
                    {{-- Telefono --}}
                    {{-- @isset($monumento->phone)
                            @isset($monumento->phone->numero)
                                {{$monumento->phone->numero}}
                    @endisset
                    @endisset --}}
                    <label for="user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona al empleado</label>
                    <select wire:model="user" id="user" name="user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected>Selecciona un empleado</option>
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                    {{$monumento->phone ? $monumento->phone->numero : 'NoPhone'}}
                    // IdEmpleado:
                    {{$monumento->user->id}}
                </td>
                <td class="px-6 py-4 text-right">
                    {{-- Acciones --}}
                    <button wire:click="abrirModal" type="button" class="text-white my-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-blue-800 dark:focus:ring-gray-100">Actualizar</button>
                    <button wire:click="destroy({{$monumento->id}})" type="button" class="text-white my-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-blue-800 dark:focus:ring-gray-100">Eliminar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
