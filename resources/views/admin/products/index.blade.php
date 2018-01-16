@extends('layouts.general')
@section('content')
    @if(session('deleteProduct'))
        <div class="alert-success row justify-between ">
            Producto eliminado
            <span class="close">x</span>
        </div>
    @endif
    <div class="m-t-20 m-b-40">
        <h2>Productos</h2>
        <a href="{{route('productos.create')}}">
            <h3 class="row align-center justify-end">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48">
                    <path fill="#002c81"
                          d="M40 12H24l-4-4H8c-2.21 0-3.98 1.79-3.98 4L4 36c0 2.21 1.79 4 4 4h32c2.21 0 4-1.79 4-4V16c0-2.21-1.79-4-4-4zm-2 16h-6v6h-4v-6h-6v-4h6v-6h4v6h6v4z"/>
                </svg>
                <span class="p-l-4">Agregar un nuevo Producto</span>
            </h3>
        </a>
    </div>
    <div class="table-container m-t-a-12">
        <table>
            <thead>
            <tr>
                <th width="40px">ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th class="is-text-center">Valor de venta</th>
                <th class="is-text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td width="40px">{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td class="max-letter">{{$product->description}}</td>
                    <td class="is-text-center">{{$product->sale_value}}</td>
                    <td>
                        <a class="row align-center justify-center" href="{{route('productos.edit',$product->id)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
                                <path fill="#538BF4"
                                      d="M6 34.5V42h7.5l22.13-22.13-7.5-7.5L6 34.5zm35.41-20.41c.78-.78.78-2.05 0-2.83l-4.67-4.67c-.78-.78-2.05-.78-2.83 0l-3.66 3.66 7.5 7.5 3.66-3.66z"/>
                            </svg>
                            <span class="p-l-4">Ver/Editar</span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

