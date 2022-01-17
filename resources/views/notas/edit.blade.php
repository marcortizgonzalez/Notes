<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Editar nota</title>
</head>
<body>
    <h1 class="p-4">App gestor de notas > Nota Detail</h1>

    <div class="container p-5">
        {{-- Route::put('/notas/{nota}',[NotaController::class,'update'])->name('notas.update'); --}}
        <form class="form-horizontal" action="{{route('notas.update',['nota'=>$nota->id])}}" method="post">
            @csrf
            {{method_field('PUT')}}
            <div class="form-group">
                <label>Titulo</label>
                <input class="form-control" type="text" name="titulo_nota" value="{{$nota->titulo_nota}}">
            </div>
            <div class="form-group pt-3">
                <label>Descripcion</label>
                <input class="form-control" type="text" name="desc_nota" id="" value="{{$nota->desc_nota}}">
            </div>
            <div class="form-group pt-3">
                <input class="btn btn-success" type="submit" value="Guardar">
            </div>
        </form>
        {{-- Route::get('/notas',[NotaController::class,'index'])->name('notas.index'); --}}
        <form action="{{route('notas.index')}}" method="post">
            @csrf
            {{method_field('GET')}}
            <div class="form-group pt-3">
                <input class="btn btn-secondary" type="submit" value="Cancelar">
            </div>
        </form>
    </div>

</body>
</html>