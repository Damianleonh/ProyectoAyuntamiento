@extends('layouts.plantilla')

@section('titulo', 'Responsables')

@section('contenido')

    <div class="container">
        <h2 align='center'>Gestión de Responsables de la actividad  {{$actividades->actividad}} del programa {{$programa->nombre}}</h2>
        <div class="row">
            <div class="col-lx-12">
                @csrf
                <form action="{{route('actividad.index')}}" method="GET">
                    <div class="form-row">
                        <div class="col-sm-4 my-1">
                            <input type="text" class="form-control" name="actividad"  placeholder="Nombre del responsable">
                        </div>
                        <div class="col-auto my-1">
                            <input type="submit" class="btn btn-primary" value="Buscar">
                            <a href="{{route('crearResponsable', $actividades->id)}}" class="btn btn-success">Nuevo</a>
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
                                <th>Departamento</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($responsables)<=0)
                                <tr>
                                    <td colspan="8">No hay resultados</td>
                                </tr>
                            @else
                                @foreach ($responsables as $item)
                            <tr>
                                {{-- <td><a href="{{route('responsable.edit',$item->id)}}" class="btn btn-warning btn-sm">Editar</a>  --}}
                                    {{-- <form action="{{route('programa.destroy',$item->id)}}" method="POST "> --}}
                                        @csrf
                                        @method('DELETE')
                                        {{-- <input type="submit" class="btn btn-danger btn-sm" value="Borrar"> --}}
                                    {{-- </form> --}}
                                </td>
                                 </td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->actividad_id}}</td>
                                <td>{{$item->responsable}}</td>
                                <td>{{$item->fecha}}</td>
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