<x-app-layout>
    <x-slot name="header">
        @if($message = Session::get('success'))
        <p class="text-green-600">{{$message}}</p>
        @endif
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Monuments list') }}
        </h2>
    </x-slot>
    <ul>
        @forelse($monumentos as $monumento)
        {{-- @dd($monumento) --}}
        {{-- @dd($monumento->phone->numero); --}}
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-2 text-gray-900 dark:text-gray-100">
                        {{-- <pre>{{ json_encode($monumentos,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) }}</pre> --}}
                        <div>
                            <li>{{$monumento->nombre}}<br/>Aforo: {{$monumento->aforo}} <br/>Ciudad: {{$monumento->provincias->nombre}} <br/>Nombre empleado: <strong>{{$monumento->user->name}}</strong> -> Tlfn contacto:
                                @isset($monumento->phone)
                                @isset($monumento->phone->numero)
                                    {{$monumento->phone->numero}}
                                @endisset
                            @endisset
                            </li>
                         </div> 
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="p-6 text-gray-900 dark:text-gray-100">
            {{-- <pre>{{ json_encode($monumentos,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) }}</pre> --}}
            <div class="py-12">
              <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                      <div class="p-6 text-gray-900 dark:text-gray-100">
                          {{-- <pre>{{ json_encode($monumentos,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) }}</pre> --}}
                          <div>
                <h2>No hay datos.</h2>
              </div>
            </div>
        </div>
    </div>
</div>
        @endforelse
    </ul>
</x-app-layout>
