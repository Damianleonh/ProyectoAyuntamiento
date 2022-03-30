<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = trim($request->get('nombre'));
        //return view('programa.index');
        //$programas = Programa::all();
        $programas = DB::table('programas')->select('id','nombre','fecha')
                        ->where('nombre', 'LIKE', '%'.$nombre.'%')
                        ->orWhere('fecha', 'LIKE', '%'.$nombre.'%')
                        ->orderBy('nombre', 'asc')
                        ->paginate(10);
        //dd( $programas);
        //return $programas;
        return view('programa.index', compact('programas', 'nombre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $programa = new Programa;
        $programa->nombre = $request->input('nombre_programa');
        $programa->usuario_id = 1;
        $programa->fecha = '2019-03-19 18:00:00';
        $programa->save();
        return redirect()->route('programa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function show(Programa $programa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function edit(Programa $programa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programa $programa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programa $programa)
    {
        //
    }
}
