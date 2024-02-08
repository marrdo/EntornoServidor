<x-app-layout>
    <form method="POST" action="{{ route('monumento.store') }}" class="w-1/2">
        @csrf
        {{-- Nombre Monumento --}}
        <section class="w-2/5 mt-6 mx-auto">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-28" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </section>
        {{-- Aforo --}}
        <section class="w-2/5 mt-6 mx-auto">
            <x-input-label for="aforo" :value="__('Aforo')" />
            <x-text-input id="aforo" class="block mt-1 w-28" type="number" name="aforo" :value="old('aforo')" required autofocus autocomplete="0" />
            <x-input-error :messages="$errors->get('aforo')" class="mt-2" />
        </section>
        <section class="mx-auto">
            @php
                $provincias->toArray();
            @endphp
            <x-input-label for="provincia" :value="__('Provincia')" />
            <x-select-input id="provincia" class="block mt-1 w-28" name="provincia" required :options="$provincias" nomObj="nombre">
                <option value="">Selecciona Provincia</option>
                @foreach ($provincias as $provincia)
                    <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
                    {{-- Si cambiamos en prop el nomObj podemos solicitar cualquier cosa ahi. --}}
                @endforeach
            </x-select-input>
            <x-input-error :messages="$errors->get('provincia')" class="mt-2" />
        </section>
        
        
        <x-primary-button class="ms-4 mt-6 mx-auto">
            {{ __('Crear') }}
        </x-primary-button>
    </form>
</x-app-layout>
