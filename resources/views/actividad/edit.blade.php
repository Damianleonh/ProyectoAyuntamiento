@extends('layouts.plantilla')

@section('titulo', 'Editar Actividad')

@section('contenido')
    <div class="col-xl-12">
        @csrf
        
        <h2 align='center'>Formulario de actualizacion de la actividad {{$actividad->actividad}}</h2>
        <form action="{{route('actividad.update', $actividad->id)}}" method="POST" align='center'>
            @method('PUT')
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="nombre_actividad">Introduce el nuevo nombre de la actividad:</label>
                <input name="nombre_actividad" type="text" required><br>
            </div>
            <div class="form-group">
                <br><label for="descripcion">Neuva descripcion de la actividad a crear:</label><br>
                <textarea name="descripcion" id="nombre_programa" cols="30" rows="10" required></textarea>
            </div>
            <div class="form-group">
                <br><input type="submit" class="btn btn-primary" value="Guardar">
                {{-- <input type="reset" class="btn btn-warning" value="Cancelar"> --}}
                <a href="javascript:history.back()" class="btn btn-warning">Cancelar</a>
                <a href="javascript:history.back()">Ir al listado</a>
            </div>
            
        </form>
    </div>
    
@endsection
