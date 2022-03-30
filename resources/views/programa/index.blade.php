@extends('layouts.plantilla')

@section('titulo', 'Form')

@section('contenido')

    <div class="container">
        <h2 align='center'>Gestion de Programas creados</h2>
        <div class="row">
            <div class="col-lx-12">
                @csrf
                <form action="{{route('programa.index')}}" method="GET">
                    <div class="form-row">
                        <div class="col-sm-4 my-1">
                            <input type="text" class="form-control" name="nombre" value="{{$nombre}}">
                        </div>
                        <div class="col-auto my-1">
                            <input type="submit" class="btn btn-primary" value="Buscar">
                        </div>
                        <div class="col-auto my-1">
                            <a href="{{route('programa.create')}}" class="btn btn-success">Nuevo</a>
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
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th>Detalles</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($programas)<=0)
                                <tr>
                                    <td colspan="8">No hay resultados</td>
                                </tr>
                                
                            @else
                            @foreach ($programas as $item)
                            <tr>
                                <td>Editar - Eleminar</td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->nombre}}</td>
                                <td>{{$item->fecha}}</td>
                                <td>Detalles</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{$programas->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection