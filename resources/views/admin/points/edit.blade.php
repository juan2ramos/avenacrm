@extends('layouts.general')
@section('content')
    @if($errors->any())
        <div class="alert-error row justify-between">
            Revisa los errores en los campos
            <span class="close">X</span>
        </div>
    @endif

    @if(session('cantDelete'))
        <div class="alert-warning row justify-between ">
            No puedes eliminar el punto tiene productos asociados
            <span class="close">x</span>
        </div>
    @endif
    @if(session('success'))
        <div class="alert-success row justify-between">
            El punto se ha actualizado correctamente
            <span class="close">X</span>
        </div>
    @endif
    <form action="{{route('puntos.destroy', $point->id)}}" method="post" id="delete">
        {{csrf_field()}}
        {{ method_field('DELETE') }}
    </form>
    <form action="{{route('puntos.update',$point->id)}}" method="post" class="row justify-center m-t-24">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="col-16 col-m-14 col-l-10">
            <div class="row justify-between align-center">
                <h2>Editar {{$point->name}} </h2>
                <span id="deleteElement">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 48 48">
                        <path fill="#f88282"
                              d="M12 38c0 2.21 1.79 4 4 4h16c2.21 0 4-1.79 4-4V14H12v24zM38 8h-7l-2-2H19l-2 2h-7v4h28V8z"/>
                    </svg>
                </span>

            </div>
            <div>
                <label for="name">Nombre</label>
                <input type="text" required
                       id="name"
                       name="name"
                       value="{{old('name')?old('name'):$point->name}}"
                       @if ($errors->has('name')) class="error" @endif>
                @if ($errors->has('name'))<span class="error">{{ $errors->first('name') }}</span>@endif
            </div>

            <div class="m-t-24">
                <label for="address">Dirección</label>
                <input name="address" required
                       type="text"
                       value="{{old('address')?old('address'):$point->address}}"
                       class=" @if($errors->has('address')) error @endif " id="address">
                @if ($errors->has('address'))<span class="error">{{ $errors->first('address') }}</span>@endif
            </div>

            <div class="m-t-24">
                <label for="area">Zona</label>
                <select name="area" id="area" required>
                    <option value="">Elegir Zona</option>
                    @php($option = old('area')?old('area'):$point->area_id)
                    @foreach($areas as $key => $area)
                        <option {{$option == $key?'selected':''}} value="{{$key}}">{{$area}}</option>
                    @endforeach
                </select>
                @if ($errors->has('area'))<span class="error">{{ $errors->first('area') }}</span>@endif
            </div>

            <p class="m-t-32 m-b-12">Productos por punto</p>
            <div class="row justify-around " id="products-point">

                @foreach($products as $product)
                    <div class="col-16 col-m-8 row  align-center">
                        <div class="col-16 col-m-8 ">
                            <input
                                    {{ old("products.$product->id") ||
                                        $point->products->contains($product->id) ?'checked':''
                                    }}
                                    id="products{{$product->id}}"
                                    name="products[{{$product->id}}]"
                                    type="checkbox"
                                    value="{{$product->id}}"
                                    class="productsPoint"
                                    data-enable="sale_value{{$product->id}}"
                            >
                            <label for="products{{$product->id}}" class="p-r-12">{{$product->name}}</label><br>
                        </div>
                        <label class="col-16 col-m-8 ">
                            <input
                                    id="sale_value{{$product->id}}"
                                    name="products[{{$product->id}}][sale_value]"
                                    type="text"
                                    class="money"

                                    value="{{
                                    old("product.$product->id.id")
                                    ?old("product.$product->id.sale_value")
                                    :(
                                        ($point->products->contains($product->id))
                                        ?$point->products->where('id',$product->id)->first()->point_sale_value
                                        :$product->sale_value
                                    )}}"
                                    {{old("products.$product->id") ||  $point->products->contains($product->id)
                                        ?'':'disabled'
                                    }}
                            >
                        </label>

                    </div>
                @endforeach
            </div>
            <div class="m-t-24">
                <button class="is-full-width">Actualizar punto</button>
            </div>
        </div>
    </form>
@endsection