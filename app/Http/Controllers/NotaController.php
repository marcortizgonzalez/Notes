<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notas=DB::select('select * from notas');
        return view('notas.index', compact('notas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::insert('insert into notas (titulo_nota, desc_nota) values (?,?)',[$request->input('titulo_nota'),$request->input('desc_nota')]);
        return redirect()->route('notas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(Nota $nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit(Nota $nota)
    {
        $notas=DB::select('select * from notas where id=?',[$nota->id]);
        $nota=$notas[0];
        return view('notas.edit', compact('nota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nota $nota)
    {
        DB::update('update notas set titulo_nota=?, desc_nota=? where id=?',[$request->input('titulo_nota'),$request->input('desc_nota'),$nota->id]);
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nota $nota)
    {
        DB::delete('delete from notas where id=?',[$nota->id]);
        return redirect()->route('notas.index');
    }
    
    /* Funciones customizadas *******************************************/

    /**
     * Display the specified resources.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    ********************************************************************/
    public function shows(Request $request)
    {
       $notas=DB::select('select * from notas where tiutlo_nota like ?',['%'.$request->input('tiutlo_nota').'%']);
       // return view('notas.index', compact('notas'));
    
       return response()->json($notas);
    }

}
