{{-- <h1>Crear responsable  {{$responsables->id}} {{$responsables->actividad}} {{$responsables->programa_id}}</h1> --}}
@extends('layouts.plantilla')

@section('titulo', 'Form')

@section('contenido')
    <div class="col-xl-12">
        @csrf
        <h2 align='center'>Formulario de asignacion de responsable a la actividad {{$responsables->actividad}}</h2>
        <form action="{{route('responsable.store')}}" method="POST" align='center'>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <input type="text" value="{{$responsables->id}}" name="actividad_id" hidden>
                <label for="nombre_programa">Seleccione Departamento:</label>
                {{-- <input name="nombre_programa" type="text" required><br> --}}
                <select name="departamento" id="">
                    <option value="">Seleccione departamento</option>
                    @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->departamentos }}">{!! $departamento->departamentos !!}</option>
                    @endforeach
                </select>  
            </div>
            {{-- <div class="form-group">
                <br><label for="nombre_programa">introduce nombre del programa:</label>
                <input type="text"  name="nombre_programa" required>
                <textarea name="nombre_programa" id="nombre_programa" cols="30" rows="10"></textarea>
            </div> --}}
            <div class="form-group">
                <br><input type="submit" class="btn btn-primary" value="Guardar">
                <input type="reset" class="btn btn-warning" value="Cancelar">
                <a href="javascript:history.back()">Ir al listado</a>
            </div>
            
        </form>
    </div>
    {{-- <h4>{{$responsables[0]->departamento}}</h4> --}}
    {{-- <h4>{!! $departamentos !!}</h4> --}}
@endsection