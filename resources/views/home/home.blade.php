@extends('layouts.general')
@section('content')
    <div class="row m-t-a-36">
        <h3 class="col-l-8 col-16">Inventario {{$today}} puntos {{$points->count()}} de {{$pointAll}}</h3>
        <form method="get" action="{{route('pointDetailDate','date')}}"
              class="col-l-8  col-16 row align-center justify-end"
              id="form-points-date"
        >
            <label for="date" class="col-l-4 col-16 is-text-right"> <b>Filtro por fecha: </b></label>
            <input type="text" id="date" class=" col-7 date m-l-20">
            <button class="col-3" type="submit">enviar</button>
        </form>
    </div>
    <div class="table-container m-a">
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre punto</th>
                <th>Dirección</th>
                <th class="is-text-right">Valor vendido total</th>
                <th class="is-text-center">Accion</th>
            </tr>
            </thead>
            <tbody>
            @foreach($points as $point)
                <tr>
                    <td>{{$point->id}}</td>
                    <td>{{$point->name}}</td>
                    <td>{{$point->address}}</td>
                    <td class="is-text-right">{{$point->sum }}</td>
                    <td class="is-text-center">
                        <a href="{{route('pointDetailToday',[$point->id,session('date')])}}">Ver detalle</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection