<?php

namespace App\Http\Controllers;

use Actividad;
use Illuminate\Http\Request;
use App\Models\actividades;
use Illuminate\Support\Facades\DB;
use DateTime;
class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $actividad = trim($request->get('actividad'));
        $actividades = DB::table('actividades')->select('id','programa_id','actividad','descripcion','fecha')
                                    ->where('actividad', 'LIKE', '%'.$actividad . '%')
                                    ->orderBy('actividad', 'asc')
                                    ->paginate(10);
        // return $actividades;
        return view('actividad.index', compact('actividades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('actividad.create');
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
        $dt = new DateTime();
        $actividades = new Actividades;
        $actividades->actividad = $request->input('nombre_actividad');
        $actividades->programa_id = 1;
        $actividades->descripcion = $request->input('descripcion');
        $actividades->fecha = $dt->format('Y-m-d H:i:s');
        $actividades->save();
        return redirect()->route('actividad.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $actividad = actividades::findOrFail($id);
        // return $actividad;
        return view('actividad.edit', compact('actividad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $actividades = actividades::findOrFail($id);
        $actividades->actividad = $request->input('nombre_actividad');
        $actividades->descripcion = $request->input('descripcion');
        $actividades->save();
        return redirect()->route('actividad.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
