<?php

namespace App\Http\Controllers;

use Actividad;
use Illuminate\Http\Request;
use App\Models\{actividades, Programa};
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
        $programa_id = trim($request->get('programa_id'));
        $nombre = Programa::findOrFail($programa_id);

        $actividades = DB::table('actividades')->select('id','programa_id','actividad','descripcion','fecha')
                                    ->where('programa_id','=', $nombre->id)
                                    ->where('actividad', 'LIKE', '%'.$actividad . '%')
                                    ->orderBy('actividad', 'asc')
                                    ->paginate(100);
        return view('actividad.index', compact('actividades', 'nombre'));

        // dd($actividades);
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
        $actividades->programa_id = $request->input('programa_id');;
        $actividades->descripcion = $request->input('descripcion');
        $actividades->fecha = $dt->format('Y-m-d H:i:s');
        $actividades->save();
        return redirect()->route('actividadesPrueba', $request->input('programa_id'));

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

    public function actividadesPrueba($programa_id){
        // $actividades = DB::table('programas')
        //                 ->join('actividades', 'programas.id', 'actividades.programa_id')
        //                 ->select('actividades.*', 'programas.*', 'actividades.id AS actividad_id')
        //                 ->where('actividades.programa_id', $programa_id)
        //                 ->orderBy('actividad', 'asc')
        //                 ->paginate(10);
        $actividades = Actividades::where('programa_id', $programa_id)->paginate(10);
        
        $nombre = Programa::findOrFail($programa_id);

        return view('actividad.index', compact('actividades', 'nombre'));
        // return $actividades;        
    }

    public function detalleActividad($programa_id)
    {
        // $actividad = Actividades::findOrFail($actividad_id);
        // $actividad->programa = Programa::findOrFail($actividad->programa_id);
        $actividades = Actividades::where('programa_id', $programa_id)->paginate();
        $programa = Programa::findOrFail($programa_id);

        // dd($actividades);
        // return $actividades;
        return view('vistas.detalles', compact('actividades', 'programa'));
    }

    public function crearActividad($programa_id)
    {
        $programa = Programa::findOrFail($programa_id);
        return view('actividad.create', compact('programa'));
    }
}
