{{-- <h1>Crear responsable  {{$responsables->id}} {{$responsables->actividad}} {{$responsables->programa_id}}</h1> --}}
@extends('layouts.plantilla')

@section('titulo', 'Form')

@section('contenido')
    <div class="col-xl-12">
        @csrf
        <h2 align='center'>Formulario de asignacion de responsable a la actividad {{$responsables->actividad}}</h2>
        <form action="{{route('programa.store')}}" method="POST" align='center'>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="nombre_programa">Seleccione Departamento:</label>
                {{-- <input name="nombre_programa" type="text" required><br> --}}
                <select name="" id="">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
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
    <select name="" id="">
        <option value="">Seleccione</option>
        @foreach ($departamentos as $departamento)
            <option value="{{ $departamento->id }}">{!! $departamento->departamentos !!}</option>
        @endforeach
    </select>
    {{-- <h4>{!! $departamentos !!}</h4> --}}
@endsection