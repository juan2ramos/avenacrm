@extends('layouts.general')
@section('content')
    @if(session('update'))
        <div class="alert-success">
            Inventario actualizado
        </div>
    @endif
    @if(session('insert'))
        <div class="alert-success">
            Inventario ingresado
        </div>
    @endif
    <div class="row m-t-a-36">
        <h2 class="col-l-8 col-16">Inventario</h2>
        <form method="get" action="{{route('inventoryDetailDate','date')}}"
              class="col-l-8  col-16 row align-center justify-end"
              id="form-points-date"
        >
            <label for="date" class="col-l-4 col-16 is-text-right"> <b>Filtro por fecha: </b></label>
            <input type="text" id="date" class=" col-7 date m-l-20">
            <button class="col-3" type="submit">enviar</button>
        </form>
    </div>
    @if($inventories->count() )

        <form action="{{route('inventarios.updateMany',$date)}}" id="formInsertProductPoint" method="post"
              class="row justify-center m-t-24">
            {{csrf_field()}}
            <div class="col-16 ">
                <h4>Inventario de bodega para {{$date}} </h4>
                <div class="row justify-between">

                    @foreach($inventories as $inventory)
                        <input type="hidden" name="products[{{$inventory->product->id}}][date]" value="{{$date}}">
                        <input type="hidden" name="products[{{$inventory->product->id}}][product_id]" value="{{$inventory->product->id}}">

                        <div class="col-4 p-l-l8">
                            <p class="m-t-24"><b>{{$inventory->product->name}}</b></p>
                            <input type="number" placeholder="Producido"
                                   name="products[{{$inventory->product->id}}][produced]"
                                   value="{{old('available',$inventory->produced)}}" required
                                   class=" m-b-16" title="produced">

                            @if($inventory->product->see_description)<p>{{$inventory->product->description}}</p> @endif
                            <input type="number" id="name"
                                   name="products[{{$inventory->product->id}}][dispatched]"
                                   value="{{$inventory->dispatched}}"
                                   placeholder="Despachado" required
                                   @if ($errors->has("products.$inventory->product->id.dispatched")) class="error" @endif>
                        </div>
                    @endforeach
                </div>
                <div class="m-t-24  m-b-24">
                    <button class="is-full-width">Actualizar inventario</button>
                </div>
            </div>
        </form>

    @endif
    @if($index && !$inventories->count() )
        <form action="{{route('inventarios.store')}}" id="formInsertProductPoint" method="post"
              class="row justify-center m-t-24">
            {{csrf_field()}}
            <div class="col-16 ">
                <h4>Ingrese el inventario de bodega de hoy </h4>
                <div class="row justify-between">
                    @foreach($products as $product)
                        <input type="hidden" name="products[{{$product->id}}][date]" value="{{$date}}">
                        <input type="hidden" name="products[{{$product->id}}][product_id]" value="{{$product->id}}">
                        <div class="col-4 p-l-l8">
                            <p class="m-t-24"><b>{{$product->name}}</b></p>
                            <input type="number" placeholder="Producido"
                                   name="products[{{$product->id}}][produced]"
                                   value="{{old('available')}}" required
                                   class=" m-b-16" title="produced">

                            @if($product->see_description)<p>{{$product->description}}</p> @endif
                            <input type="number" id="name"
                                   name="products[{{$product->id}}][dispatched]"
                                   value="{{old("products.$product->id.dispatched")}}"
                                   placeholder="Despachado" required
                                   @if ($errors->has("products.$product->id.dispatched")) class="error" @endif>

                        </div>
                    @endforeach
                </div>
                <div class="m-t-24  m-b-24">
                    <button class="is-full-width">Agregar inventario</button>
                </div>
            </div>
        </form>

    @endif

@endsection

