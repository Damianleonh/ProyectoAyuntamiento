@extends('layouts.plantilla')

@section('titulo', 'Actividades')

@section('contenido')

    <div class="container">
        <h2 align='center'>Gestión de {{ $nombre->nombre }} del programa </h2>
        <div class="row">
            <div class="col-lx-12">
                @csrf
                <form action="{{route('actividad.index')}}" method="GET">
                    <div class="form-row">
                        <div class="col-sm-4 my-1">
                            <input type="text" class="form-control" name="actividad"  placeholder="Nombre de la actividad">
                            <input type="text" value="{{$nombre->id}}" name="programa_id" hidden>
                        </div>
                        <div class="col-auto my-1">
                            <input type="submit" class="btn btn-primary" value="Buscar">
                            <a href="{{route('crearActividad', $nombre->id)}}" class="btn btn-success">Nuevo</a>
                        </div>
                    </div>
                </form>
            </div>   
            <div class="col-lx-12">
                <div class="table-respon">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Opciones</th>
                                <th>ID</th>
                                <th>Id del programa</th>
                                <th>Nombre</th>
                                <th>Responsables</th>
                                <th>Descripcion</th>
                                <th>Fecha</th>
                                <th>Detalles</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($actividades)<=0)
                                <tr>
                                    <td colspan="8">No hay resultados</td>
                                </tr>
                                
                            @else
                            @foreach ($actividades as $item)
                            <tr>
                                <td><a href="{{route('actividad.edit',$nombre->id)}}" class="btn btn-warning btn-sm">Editar</a> 
                                    
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="delete_modal_actividad_{{$item->id}}">
                                        Borrar
                                    </button>
                                 </td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->programa_id}}</td>
                                <td>{{$item->actividad}}</td>
                                <td><a href="{{route('responsablesVista', [$item->id])}}">Responsables</a></td>
                                <td>{{$item->descripcion}}</td>
                                <td>{{$item->fecha}}</td>
                                <td><a href="{{ route('detalleActividad', $nombre->id) }}">Detalles</a></td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#label">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="label" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
            </div>
        </div>
    </div>

@endsection