<div wire:poll.15s class="mt-10 mx-5 md:mx-20 relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm  text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            Monumentos de Andalucía
            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">En esta sección podemos ver, modificar o eliminar los monumento que tenemos en nuestra Andalucía.</p>
            @if(session('destroySucces'))
            <p class=" mt-1 text-sm text-green-600"><strong>{{session('destroySucces')}}</strong></p>
            @endif
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    {{ "Nombre" }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ "Ciudad" }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ "Aforo" }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ "Telefono" }}
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Acciones</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($monumentos as $monumento)
            <livewire:fila :monumento="$monumento" wire:key="filaMonumento_{{$monumento->id}}" :users="$users" :provincias="$provincias" />
            @endforeach
            {{-- <tr>
                <td>Atualizado a: {{now()}}</td>
            </tr> --}}
        </tbody>
    </table>
    @if($modal)
    {{-- @dd($monumentoUpdate) --}}
    <!-- Main modal -->
    <div tabindex="-1" aria-hidden="true" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 bottom-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{__('Actualizar monumento')}}
                    </h3>
                    <button type="button" wire:click="cerrarModal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre:{{$monumento->nombre}}</label>
                            <input wire:model="nombre" wire:key="nombre_{{$monumento->id}}" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nombre del monumento" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="aforo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Aforo</label>
                            <input wire:model="aforo" wire:key="aforo_{{$monumento->id}}" type="number" name="aforo" id="aforo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="100 personas" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="provincia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona la provincia</label>
                            <select wire:model.live="provincia" wire:key="provincia_{{$monumento->id}}" id="provincia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="{{$monumento->provincias->id}}" selected>{{$monumento->provincias->abreviatura}} -- {{$monumento->provincias->nombre}}</option>
                                @foreach($provincias as $provincia)
                                <option value="{{$provincia->id}}">{{$provincia->abreviatura}} -- {{$provincia->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona al empleado</label>
                            <select wire:model.live="user" id="user" name="user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="{{$monumento->user->id}}" selected>Id:{{$monumento->user->id}}--{{$monumento->user->name}} ->{{$monumento->phone ? $monumento->phone->numero : 'NoPhone'}}</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}} -> {{$user->phone->numero}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="button" wire:click="update" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                        {{__('Actualizar monumento')}}
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>
