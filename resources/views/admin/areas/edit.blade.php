@extends('layouts.general')
@section('content')
    @if($errors->any())
        <div class="alert-error row justify-between">
            Revisa los errores en los campos
            <span class="close">X</span>
        </div>
    @endif
    @if(session('success'))
        <div class="alert-success row justify-between">
            La zona se ha actualizado correctamente
            <span class="close">X</span>
        </div>
    @endif
    @if(session('cantDelete'))
        <div class="alert-warning row justify-between">
            No puedes eliminar esta zona, tiene puntos asignados
            <span class="close">X</span>
        </div>
    @endif
    <form action="{{route('zonas.destroy', $area->id)}}" method="post" id="delete">
        {{csrf_field()}}
        {{ method_field('DELETE') }}
    </form>
    <form action="{{route('zonas.update',$area->id)}}" method="post" class="row justify-center m-t-24">
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <div class="col-16 col-m-14 col-l-10">
            <div class="row justify-between align-center">
                <h2>Editar {{$area->name}}</h2>
                <span id="deleteElement">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 48 48">
                        <path fill="#f88282"
                              d="M12 38c0 2.21 1.79 4 4 4h16c2.21 0 4-1.79 4-4V14H12v24zM38 8h-7l-2-2H19l-2 2h-7v4h28V8z"/>
                    </svg>
                </span>
            </div>
            <div>
                <label for="name">Nombre</label>
                <input type="text"
                       id="name"
                       name="name"
                       required
                       value="{{old('name')?old('name'):$area->name}}"
                       @if ($errors->has('name')) class="error" @endif
                >
                @if ($errors->has('name'))<span class="error">{{ $errors->first('name') }}</span>@endif
            </div>

            <div class="m-t-24">
                <button class="is-full-width">Actualizar Zona</button>
            </div>
        </div>
    </form>
@endsection