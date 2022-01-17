<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

/**********************************/
/* Ejemplo de rutas con Modelo cliente:
RequestType Path	                    Action	RouteName
GET	        /clientes	                index	clientes.index
GET	        /clientes/create	        create	clientes.create
POST	    /clientes	                store	clientes.store
GET	        /clientes/{cliente}	        show	clientes.show
GET	        /clientes/{cliente}/edit	edit	clientes.edit
PUT/PATCH	/clientes/{cliente}	        update	clientes.update
DELETE	    /clientes/{cliente}	        destroy	clientes.destroy
***********************************/

/* Display a listing of the resource. */
Route::get('/notas',[NotaController::class,'index'])->name('notas.index');

/* Show the form for editing the specified resource. */
Route::get('/notas/{nota}/edit',[NotaController::class,'edit'])->name('notas.edit');

/* Update the specified resource in storage. */
Route::put('/notas/{nota}',[NotaController::class,'update'])->name('notas.update');

/* Remove the specified resource from storage. */
Route::delete('/notas/{nota}',[NotaController::class,'destroy'])->name('notas.destroy');

/* Show the form for creating a new resource. */
Route::get('/notas/create',[NotaController::class,'create'])->name('notas.create');

/* Store a newly created resource in storage. */
Route::post('/notas',[NotaController::class,'store'])->name('notas.store');

/* Rutas customizadas *******************************************/
/* Display the specified resources. */
Route::post('/notas/shows',[NotaController::class,'shows'])->name('notas.shows');

