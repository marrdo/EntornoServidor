<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Insert new monument') }}
        </h2>
    </x-slot>

    <!-- Aquí va el contenido del formulario para insertar un nuevo monumento -->
    <livewire:form-monument :monumentos="$monumentos" :users="$users" :provincias="$provincias" />

    <!-- Definir la propiedad $mostrarModal en el componente padre -->
    {{-- @php
    $mostrarModal = false;
    @endphp --}}

    <!-- Escuchar el evento y cambiar el valor de $mostrarModal -->
    <livewire:table-monument 
    :monumentos="$monumentos"  />

    <!-- Mostrar el modal solo cuando $mostrarModal sea true -->
    {{-- @if($mostrarModal)
    <livewire:update-monumento 
    :monumentoSeleccionado = "$monumentoSeleccionado" 
    wire:model.defer="mostrarModal" />
    @endif --}}


</x-app-layout>
