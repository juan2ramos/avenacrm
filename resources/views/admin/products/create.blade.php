@extends('layouts.general')
@section('content')
@if($errors->any())
    <div class="alert-error">
        Revisa los errores en los campos
    </div>
@endif
    <form action="{{route('productos.store')}}" method="post" class="row justify-center m-t-24">
        {{csrf_field()}}
        <div class="col-16 col-m-14 col-l-10">
            <h2>Crear un nuevo producto</h2>
            <div>
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" @if ($errors->has('name')) class="error" @endif>
                @if ($errors->has('name'))<span class="error">{{ $errors->first('name') }}</span>@endif
            </div>
            <div class="m-t-24">
                <label for="sale_value">Valor de venta</label>
                <input name="sale_value" type="number" class="money" id="sale_value">
            </div>
            <div class="m-t-24">
                <label for="description">Descripción</label>
                <textarea name="description" id="description"></textarea>
            </div>
            <div class="m-t-24">
                <button class="is-full-width">Agregar producto</button>
            </div>
        </div>
    </form>
@endsection