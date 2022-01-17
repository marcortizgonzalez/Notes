<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Crear nota</title>
</head>
<body>
    <h1 class="p-4">App gestor de notas > Nota New</h1>

    <div class="container p-5">
        {{-- Route::post('/notas',[ClienteController::class,'store'])->name('notas.store'); --}}
        <form class="form-horizontal" action="{{route('notas.store')}}" method="post">
            @csrf
            {{method_field('POST')}}
            <div class="form-group">
                <label>Titulo</label>
                <input class="form-control" type="text" name="titulo_nota">
            </div>
            <div class="form-group pt-3">
                <label>Descripcion</label>
                <input class="form-control" type="text" name="desc_nota" id="">
            </div>
            <div class="form-group pt-3">
                <input class="btn btn-success" type="submit" value="Guardar">
            </div>
        </form>
        {{-- Route::get('/notas',[ClienteController::class,'index'])->name('notas.index'); --}}
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