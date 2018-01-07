@extends('layouts.general')
@section('content')
    @if($errors->any())
        <div class="alert-error row justify-between">
            Revisa los errores en los campos
            <span class="close">X</span>
        </div>
    @endif

    <form action="{{route('puntos.store')}}" method="post" class="row justify-center m-t-24">
        {{csrf_field()}}
        <div class="col-16 col-m-14 col-l-10">
            <h2>Crear un nuevo punto</h2>

            <div>
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" value="{{old('name')}}" required
                       @if ($errors->has('name')) class="error" @endif>
                @if ($errors->has('name'))<span class="error">{{ $errors->first('name') }}</span>@endif
            </div>

            <div class="m-t-24">
                <label for="address">Dirección</label>
                <input name="address" type="text" value="{{old('address')}}" required
                       class=" @if($errors->has('address')) error @endif " id="address">
                @if ($errors->has('address'))<span class="error">{{ $errors->first('address') }}</span>@endif
            </div>

            <div class="m-t-24">
                <label for="area">Area</label>
                <select name="area" id="area" required>
                    <option value="">Elegir Zona</option>
                    @foreach($areas as $key => $area)
                        <option {{(old('area') == $key)?'selected':''}} value="{{$key}}">{{$area}}</option>
                    @endforeach
                </select>
            </div>

            <div class="m-t-24">
                <button class="is-full-width">Agregar punto</button>
            </div>
        </div>
    </form>
@endsection