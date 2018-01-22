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
            El producto se ha actualizado correctamente
            <span class="close">X</span>
        </div>
    @endif
    <form action="{{route('productos.destroy', $product->id)}}" method="post" id="delete">
        {{csrf_field()}}
        {{ method_field('DELETE') }}
    </form>
    <form action="{{route('productos.update',$product->id)}}" method="post" class="row justify-center m-t-24">
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <div class="col-16 col-m-14 col-l-10">
            <div class="row justify-between align-center">
                <h2>Editar {{$product->name}}</h2>
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
                       value="{{old('name')?old('name'):$product->name}}"
                       @if ($errors->has('name')) class="error" @endif
                >
                @if ($errors->has('name'))<span class="error">{{ $errors->first('name') }}</span>@endif
            </div>

            <div class="m-t-24">
                <label for="sale_value">Valor de venta</label>
                <input name="sale_value"
                       type="text"
                       required
                       value="{{old('sale_value')?old('sale_value'):$product->sale_value}}"
                       class="money @if($errors->has('sale_value')) error @endif "
                       id="sale_value"
                >
                @if ($errors->has('sale_value'))<span class="error">{{ $errors->first('sale_value') }}</span>@endif
            </div>

            <div class="m-t-24">
                <label for="description">Descripción</label>
                <textarea name="description" id="description"
                >{{old('description')?'description':$product->description}}</textarea>
            </div>
            <div class="col-16 col-m-8 ">
                <input
                        {{ old("see_description",$product->see_description)  ?'checked':'' }}
                        id="see_description"
                        name="see_description"
                        type="checkbox"
                        value="1"
                        class="productsPoint"
                >
                <label for="see_description" class="p-r-12">Mostrar la descripción para el punto de venta</label><br>
            </div>

            <div class="m-t-24">
                <button class="is-full-width">Actualizar producto</button>
            </div>
        </div>
    </form>
@endsection