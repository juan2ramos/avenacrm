@extends('layouts.general')
@section('content')

    @if($errors->any())
        <div class="alert-error row justify-between">
            Revisa los errores en los campos
            <span class="close">X</span>
        </div>
    @endif
    @if(session('pointProductUpdate'))
        <div class="alert-success row justify-between ">
            Datos ingresados!
            <span class="close">x</span>
        </div>
    @endif
    @isset($products)
        <h4 class="m-t-24">Inventario de {{$day}} {{$date}} </h4>
        <div class="row">

            @foreach($products as $product)
                <div class="col-4 p-l-l8">
                    <h3>{{$product->name}}</h3>
                    <p><b>Disponible: </b> {{$product->pivot->available}}</p>
                    @if($product->see_description)<p>{{$product->description}}</p> @endif
                    <p><b>Vendidos: </b> {{$product->pivot->sold}}</p>
                </div>
            @endforeach
        </div>
    @endif

    @if($day == "ayer")
        <form action="{{route('pointProduct.update')}}" id="formInsertProductPoint" method="post"
              class="row justify-center m-t-24">
            {{csrf_field()}}
            <div class="col-16 ">
                <h4>Ingrese el inventario de hoy {{$today}} </h4>
                <div class="row justify-between">
                    @forelse($productsAvailable as $product)
                        <div class="col-4 p-l-l8">
                            <p class="m-t-24"><b>{{$product->name}}</b></p>
                            <input type="number" placeholder="Disponible"
                                   name="products[{{$product->id}}][available]"
                                   value="{{old('available')}}" required
                                   class=" @if ($errors->has('available'))error @endif m-b-16" title="available">
                            @if ($errors->has('name'))<span class="error">{{ $errors->first('name') }}</span>@endif

                            @if($product->see_description)<p>{{$product->description}}</p> @endif
                            <input type="number" id="name"
                                   name="products[{{$product->id}}][sold]"
                                   value="{{old('name')}}"
                                   placeholder="Vendido" required
                                   @if ($errors->has('name')) class="error" @endif>
                            @if ($errors->has('name'))<span class="error">{{ $errors->first('name') }}</span>@endif

                        </div>
                    @empty
                        <p>Este punto no tiene asignado ningún producto</p>
                    @endforelse
                </div>
                <div class="m-t-24  m-b-24">
                    <button class="is-full-width">Agregar inventario</button>
                </div>
            </div>
        </form>
    @endif
@endsection
