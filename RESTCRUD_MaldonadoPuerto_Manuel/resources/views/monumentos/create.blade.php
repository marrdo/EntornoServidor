


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Insert new monument') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!--Estilos control type text-->
                    <form method="POST" action="{{route('monumentos.store')}}">
                        @csrf
                        <div class="mt-6">
                            <label class="block font-medium text-sm text-gray-700 dark:text-slate-100">
                                {{__('Monument name')}}
                            </label>
                            <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full dark:bg-slate-700 dark:text-salte-100" type="text" name='nombre' value="{{ old('nombre') }}">
                            @error('nombre')
                            <p class="mt-1 text-sm text-red-600">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mt-6">
                            <label class="block font-medium text-sm text-gray-700 dark:text-slate-100">
                                {{__('Capacity')}}
                            </label>
                            <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full dark:bg-slate-700 dark:text-salte-100" type="number" name='aforo' value="{{ old('aforo') }}">
                            @error('aforo')
                            <p class="mt-1 text-sm text-red-600">{{$message}}</p>
                            @enderror
                        </div>
                        <!--Estilos control type select-->
                        <div class="mt-6">
                            <label class="block font-medium text-sm text-gray-700 dark:text-slate-100">{{__('User')}}</label>
                            <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full dark:bg-slate-700 dark:text-salte-100" name='user_id'>
                                <option disabled hidden {{old('user') == "" ? 'selected' : ''}} value="">{{__('Choose a user')}}</option>
                                @foreach ($users as $user)
                                <option value="{{$user->id}}" {{old('user') == $user->id ? 'selected' : ''}}>{{$user->name." - ".$user->email}} </option>
                                @endforeach
                            </select>
                            @error('user')
                            <p class="mt-1 text-sm text-red-600">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mt-6">
                            <label class="block font-medium text-sm text-gray-700 dark:text-slate-100">{{__('Province')}}</label>
                            <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full dark:bg-slate-700 dark:text-salte-100" name='provincia'>
                                <option disabled hidden {{old('provincia') == "" ? 'selected' : ''}} value="">{{__('Choose a province')}}</option>
                                @foreach ($provincias as $provincia)
                                <option value="{{$provincia->id}}" {{old('provincia') == $provincia->id ? 'selected' : ''}}>{{$provincia->abreviatura." - ".$provincia->nombre}} </option>
                                @endforeach
                            </select>
                            @error('provincia')
                            <p class="mt-1 text-sm text-red-600">{{$message}}</p>
                            @enderror
                        </div>
                        <!--Estilos botón -->
                        <div class="mt-6">
                            <button type="submit" class="hover:bg-indigo-600 px-4 py-2 rounded-md bg-indigo-800 text-slate-100  transition-colors duration-300">{{__('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
