@extends('layouts.general')
@section('content')
    @if($errors->any())
        <div class="alert-error row justify-between">
            Revisa los errores en los campos
            <span class="close">X</span>
        </div>
    @endif
    <form action="{{route('productos.store')}}" method="post" class="row justify-center m-t-24">
        {{csrf_field()}}
        <div class="col-16 col-m-14 col-l-10">
            <h2>Crear un nuevo producto</h2>

            <div>
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" value="{{old('name')}}" required
                       @if ($errors->has('name')) class="error" @endif>
                @if ($errors->has('name'))<span class="error">{{ $errors->first('name') }}</span>@endif
            </div>

            <div class="m-t-24">
                <label for="sale_value">Valor de venta</label>
                <input name="sale_value" type="text" value="{{old('sale_value')}}" required
                       class="money @if($errors->has('sale_value')) error @endif " id="sale_value">
                @if ($errors->has('sale_value'))<span class="error">{{ $errors->first('sale_value') }}</span>@endif
            </div>

            <div class="m-t-24">
                <label for="description">Descripción</label>
                <textarea name="description" id="description"></textarea>
            </div>

            <div class="col-16 col-m-8 ">
                <input
                        {{ old("see_description")  ?'checked':'' }}
                        id="see_description"
                        name="see_description"
                        type="checkbox"
                        value="{{}}"
                        class="productsPoint"
                >
                <label for="see_description" class="p-r-12">Ver descripción</label><br>
            </div>

            <div class="m-t-24">
                <button class="is-full-width">Agregar producto</button>
            </div>
        </div>
    </form>
@endsection