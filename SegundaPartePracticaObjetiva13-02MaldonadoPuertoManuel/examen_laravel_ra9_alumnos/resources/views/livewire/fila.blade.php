<tr wire:poll.5s class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
    <td class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap dark:text-white ">
        {{-- Nombre --}}
        <input wire:key="nombre_{{$monumento->id}}" class="text-gray-900" type="text" wire:model.live.debounce.1000ms="nombre">
    </td>
    <td class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap dark:text-white ">
        {{-- Ciudad --}}
        <label for="provincia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona la provincia</label>
        <select wire:model.live="provincia" wire:key="provincia_{{$monumento->id}}" id="provincia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="{{$monumento->provincias->id}}" selected>{{$monumento->provincias->abreviatura}} -- {{$monumento->provincias->nombre}}</option>
            @foreach($provincias as $provincia)
            <option value="{{$provincia->id}}">{{$provincia->abreviatura}} -- {{$provincia->nombre}}</option>
            @endforeach
        </select>
    </td>
    <td class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap dark:text-white ">
        {{-- Aforo --}}
        <input type="text" class="text-gray-900" wire:key="aforo_{{$monumento->aforo}}" wire:model.live="aforo">
    </td>
    <td class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap dark:text-white ">
        {{-- Telefono --}}
        {{-- @isset($monumento->phone)
        @isset($monumento->phone->numero)
        {{$monumento->phone->numero}}
        @endisset
        @endisset --}}
        <label for="user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona al empleado</label>
        <select wire:model.live="user" id="user" name="user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="{{$monumento->user->id}}" selected>Id:{{$monumento->user->id}}--{{$monumento->user->name}} ->{{$monumento->phone ? $monumento->phone->numero : 'NoPhone'}}</option>
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}} -> {{$user->phone->numero}}</option>
            @endforeach
        </select>
    </td>
    <td class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap dark:text-white ">
        {{-- Acciones --}}
        <button wire:click="update" type="button" class="text-white my-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-blue-800 dark:focus:ring-gray-100">Actualizar</button>
        <button wire:click="destroy({{$monumento->id}})" type="button" class="text-white my-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-blue-800 dark:focus:ring-gray-100">Eliminar</button>
        <button wire:click="showModal({{$monumento->id}})" wire:key="modal_{{$monumento->id}}" type="button" class="text-white my-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-blue-800 dark:focus:ring-gray-100">Desplegar monumento</button>
        @if(session('succes') && session('id')===$monumento->id)
        <p class="mt-1 text-sm text-green-600"><strong>{{session('succes')}}</strong></p>
    @endif
    </td>
</tr>
