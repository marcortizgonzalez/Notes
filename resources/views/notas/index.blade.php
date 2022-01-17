<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="js/ajax.js"></script>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <title>App gestor de notas | CRUD Laravel + AJAX</title>
</head>
<body>
    <h1 class="p-4">App gestor de notas</h1>

    <div class="p-5"> 
        <div class="row pb-3">
            <div class="col">
                {{-- Buscador (filtro) --}}
                <form method="post" onsubmit="return false">
                    <input type="hidden" name="_method" value="POST" id="postFiltro">
                    <div class="form-outline">
                        <input type="search" id="search" name="nombre" class="form-control" placeholder="Buscar por nombre..." aria-label="Search" onkeyup="filtro(); return false;"/>
                    </div>
                </form>
            </div>
            <div class="col">
                {{-- Route::get('/clientes/create',[ClienteController::class,'create'])->name('clientes.create'); --}}
                <form action="{{route('notas.create')}}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="_method" value="GET">
                    <input type="submit" class="btn btn-primary" value="Nueva nota">
                </form>
            </div>
            <div class="col"></div>
        </div>       
        <table class="table" id="table">
            <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Descripcion</th>
                <th scope="col" colspan="2">Acciones</th>
            </tr>
            @forelse ($notas as $nota)
            <tr>
                <td scope="row">{{$nota->titulo_nota}}</td>
                <td>{{$nota->desc_nota}}</td>
                <td>
                    {{-- Route::get('/clientes/{cliente}/edit',[ClienteController::class,'edit'])->name('clientes.edit'); --}}
                    <form action="{{route('notas.edit',['nota'=>$nota->id])}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="GET">
                        <button class= "btn btn-secondary" type="submit" value="Edit">Editar</button>
                    </form>
                </td>
                <td>
                    {{-- Route::delete('/clientes/{cliente}',[ClienteController::class,'destroy'])->name('clientes.destroy'); --}}
                    <form method="post">
                        <input type="hidden" name="_method" value="DELETE" id="deleteNota">
                        <button class= "btn btn-danger" type="submit" value="Delete" onclick="eliminar({{$nota->id}}); return false;">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7">No hay registros</td></tr>
            @endforelse
        </table>
    </div>
</body>
</html>