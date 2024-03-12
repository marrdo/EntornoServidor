<div wire:poll.5s class="max-w-sm mx-auto mt-5">
    <div class="relative z-0 w-full mb-5 group my-2">
        <input wire:model="nombre" type="text" name="nombre" id="nombre" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="nombre" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre Monumento</label>
        @error('nombre')
        <p class="mt-1 text-sm text-red-600">{{$message}}</p>
        @enderror
    </div>
    <div class="relative z-0 w-full mb-5 group my-2">
        <input wire:model="aforo"  type="number" name="aforo" id="aforo" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="aforo" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Aforo</label>
        @error('aforo')
        <p class="mt-1 text-sm text-red-600">{{$message}}</p>
        @enderror
    </div>

    <div class="relative z-0 w-full mb-5 group my-2">
        <label for="provincia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona la provincia</label>
        <select wire:model="provinciaId" id="provincia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" selected>Selecciona una provincia</option>
            @foreach($provincias as $provincia)
            <option value="{{$provincia->id}}">{{$provincia->abreviatura}} -- {{$provincia->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="relative z-0 w-full mb-5 group my-2">
        <label for="user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona al empleado</label>
        <select wire:model="userId" id="user" name="user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" selected>Selecciona un empleado</option>
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>
    <button wire:click="store" type="button" class="text-white my-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-500 dark:focus:ring-blue-800">Crear monumento</button>
    @if(session('succes'))
        <p class="mt-1 text-sm text-green-600"><strong>{{session('succes')}}</strong></p>
    @endif
</div>
