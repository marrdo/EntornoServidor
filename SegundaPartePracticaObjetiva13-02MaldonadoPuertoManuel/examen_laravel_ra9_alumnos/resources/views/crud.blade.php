<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Insert new monument') }}
        </h2>
    </x-slot>

    <livewire:form-monument 
    :monumentos="$monumentos" 
    :users="$users" 
    :provincias="$provincias" />
    
    <livewire:table-monument 
    :monumentos="$monumentos"
    :users="$users" 
    :provincias="$provincias"  />

</x-app-layout>
