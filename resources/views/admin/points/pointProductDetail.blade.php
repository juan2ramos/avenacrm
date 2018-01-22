@extends('layouts.general')
@section('content')

    @if(session('pointProductUpdate'))
        <div class="alert-success">
            Punto actualizado
        </div>
    @endif

    @isset($products)

        <form action="{{route('pointDetailToday.update')}}" id="formInsertProductPoint" method="post"
              class="row justify-center m-t-24">
            {{csrf_field()}}
            <div class="col-16 ">
                <h4>Fecha  inventario día {{session('date')}} del punto {{$point->name}}</h4>
                <div class="row justify-between">
                    @forelse($products as $product)

                        <div class="col-4 p-l-l8">
                            <p class="m-t-24"><b>{{$product->name}}</b></p>
                            <input type="number" placeholder="Disponible"
                                   name="products[{{$product->id}}][available]"
                                   value="{{$product->pivot->available}}" required
                                   class=" @if ($errors->has('available'))error @endif m-b-16" title="available">
                            @if ($errors->has('name'))<span class="error">{{ $errors->first('name') }}</span>@endif
                            <input type="number" id="name"
                                   name="products[{{$product->id}}][sold]"
                                   value="{{$product->pivot->sold}}"
                                   placeholder="Vendido" required
                                   @if ($errors->has('name')) class="error" @endif>
                            @if ($errors->has('name'))<span class="error">{{ $errors->first('name') }}</span>@endif
                        </div>
                    @empty
                        <p>Este punto no tiene asignado ningún producto</p>
                    @endforelse
                </div>
                <div class="m-t-a-24">
                    <button class="is-full-width">Agregar inventario</button>
                </div>
            </div>
        </form>
    @endif
@endsection