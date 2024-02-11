<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Metadatos -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Enlace al CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Script de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <!-- Título de la página -->
    <title>Formulario de Monumento</title>
</head>
<body>
    <main class="container">
        <!-- Contenedor principal -->
        <div class="row mx-auto ">
            <!-- Enlace para volver al índice -->
            <a class="col-12 mx-auto p-3 d-block " href="{{route('monumento.index')}}" class="">Index</a>
            
            <!-- Formulario de creación de monumento -->
            <form class="col-12 mx-auto p-3 gap-2" method="POST" action="{{ route('monumento.store')}}">
                @csrf <!-- Directiva de Blade para protección CSRF -->
                
                <!-- Campo de nombre del monumento -->
                <article class="p-2">
                    <label for="nombre" class="">Nombre: </label>
                    <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}">
                    @error('nombre')
                    <p class=" bg-red-800 text-dark">{{$message}}</p>
                    @enderror
                </article>
                
                <!-- Campo de aforo del monumento -->
                <article class="p-2">
                    <label for="aforo" class="">Aforo:</label>
                    <input type="number" name="aforo" id="aforo">
                    @error('aforo')
                    <p class=" bg-red-800 text-dark">{{$message}}</p>
                    @enderror
                </article>
                
                <!-- Selección de provincia del monumento -->
                <article class="p-2">
                    <label for="provincia" class=""> Provincia</label>
                    <select name="provincia" id="provincia">
                        <option value="">Escoja una provincia</option>
                        @foreach($provincias as $provincia)
                        <option value="{{$provincia->id}}">{{$provincia->nombre}}</option>
                        @endforeach
                    </select>
                    @error('provincia')
                    <p class=" bg-red-800 text-dark">{{$message}}</p>
                    @enderror
                </article>
                
                <!-- Botón de envío del formulario -->
                <input type="submit" value="Enviar" class="p-2">
            </form>
        </div>
    </main>
</body>
</html>
