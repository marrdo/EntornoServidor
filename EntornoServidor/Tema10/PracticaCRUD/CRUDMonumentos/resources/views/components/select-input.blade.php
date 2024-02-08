@props(['options' => [], 'id' => null, 'name' => null, 'disabled' => false, 'required' => false, 'nomObj' => 'nombre'])

<select id="{{ $id }}" name="{{ $name }}" {{ $disabled ? 'disabled' : '' }} {{ $required ? 'required' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}>
    @foreach ($options as $registro )
        <option value="{{ $registro->id }}">{{ $registro->$nomObj }}</option>
    @endforeach
</select>



{{-- @props(['options' => [], 'id' => null, 'name' => null, 'disabled' => false, 'required' => false]): Esta es una directiva 
de Blade que define las propiedades del componente. 
Estas propiedades son pasadas al componente cuando 
se llama. Por defecto, si no se proporciona un valor 
para alguna de estas propiedades, se asigna un valor 
predeterminado. Las propiedades son:
    options: Un array asociativo donde las claves son 
    los valores de las opciones y los valores son los 
    textos de las opciones.
    id: El atributo id del elemento select.
    name: El atributo name del elemento select.
    disabled: Un booleano que indica si el elemento 
    select debe estar deshabilitado o no.
    required: Un booleano que indica si el elemento 
    select es obligatorio o no.

<select id="{{ $id }}" name="{{ $name }}" {{ $disabled ? 'disabled' : '' }} {{ $required ? 'required' : '' }} 
{!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}>: 
Esta línea genera el elemento select HTML. Aquí se utilizan varias características de Blade y Laravel:
    -Se asignan los atributos id y name con los valores proporcionados en
     las propiedades del componente.
    -Se condicionalmente añaden los atributos disabled y required 
    según los valores de las propiedades correspondientes.
    -Se utiliza {!! !!} para renderizar los atributos HTML 
    sin escapar. Esto permite utilizar las clases CSS 
    definidas en $attributes sin escaparlas.
    -Se fusionan los atributos HTML pasados al componente con 
    las clases CSS definidas en el componente. Esto 
    se hace utilizando el método merge de $attributes.

@foreach ($options as $value => $label): Esta es una directiva de Blade 
que itera sobre el array de opciones proporcionado en 
la propiedad options. Cada elemento del array tiene 
una clave ($value) y un valor ($label).

<option value="{{ $value }}">{{ $label }}</option>: En cada iteración 
del bucle foreach, se genera un elemento option con el valor y el texto de la opción. 
El valor de la opción es la clave del array y el texto 
de la opción es el valor del array. --}}