@extends('layouts.general')
@section('content')
    <h3>Inventario {{$today}} puntos {{$points->count()}} de {{$pointAll}}</h3>
    <div class="table-container">
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre punto</th>
                <th>Dirección</th>
                <th>Accion</th>
            </tr>
            </thead>
            <tbody>
            @foreach($points as $point)
                <tr>
                    <td>{{$point->id}}</td>
                    <td>{{$point->name}}</td>
                    <td>{{$point->address}}</td>
                    <td>
                        <a href="{{route('pointDetailToday',$point->id)}}">Ver detalle</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection