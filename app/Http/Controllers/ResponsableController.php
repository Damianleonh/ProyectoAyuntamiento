<?php

namespace App\Http\Controllers;

use Actividad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{actividades, Programa, Responsable, Departamentos};
use DateTime;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $responsables = Responsable::all();
        $departamentos = Departamentos::all();
        // return utf8_encode($responsables);
        // dd($responsables, $departamentos);
        return view('responsable.index', compact('responsables', 'departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('responsable.create');
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
        $responsable = new Responsable();
        $responsable->actividad_id = $request->input('actividad_id');
        $responsable->responsable = $request->input('departamento');
        $responsable->fecha = $dt->format('Y-m-d H:i:s');
        $responsable->save();
        
        $actividades = Actividades::findOrFail($request->input('actividad_id'));
        $programa = Programa::findOrFail($actividades->programa_id);
        $responsables = Responsable::all();
        $departamentos = Departamentos::all();

        return view('responsable.index', compact('actividades', 'programa', 'responsables', 'departamentos'));
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
    public function responsablesVista($actividad_id){
        $actividades = Actividades::findOrFail($actividad_id);
        $programa = Programa::findOrFail($actividades->programa_id);
        $responsables = DB::table('responsables')->select('*')
            ->where('actividad_id', '=', $actividad_id)
            ->orderBy('responsable')
            ->paginate(100);
        $departamentos = Departamentos::all();

        return view('responsable.index', compact('actividades', 'programa', 'responsables', 'departamentos'));
        // return $actividades;        
    }

    public function crearResponsable($actividad_id)
    {
        $responsables = Actividades::findOrFail($actividad_id);
        $departamentos = Departamentos::all();

        return view('responsable.create', compact('responsables','departamentos'));
        // return $departamentos;
    }
}
