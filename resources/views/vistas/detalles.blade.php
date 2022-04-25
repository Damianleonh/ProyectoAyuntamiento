@extends('layouts.plantilla')

@section('titulo', 'Detalles')
<link rel="stylesheet" href="{{ asset('css/cardStyle.css') }}">
@section('contenido')


<div class="card">
    <div class="container" align='center'>
      <h4><b>Programa {{$programa->nombre}}</b></h4>
      <p>actividades</p>
      @if (count($actividades)<=0)
        <p>No hay activdades relacionadas al programa {{$programa->nombre}}</p>                          
      @else
      @foreach ($actividades as $item)
      <p>Actividad: {{$item->actividad}}</p>
      <p>Descripcion: {{$item->descripcion}}</p>
      @endforeach
      @endif
    </div>
  </div>
    
@endsection
