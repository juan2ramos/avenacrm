@extends('layouts.general')
@section('content')
    <div class="table-container">
        <table>
            <thead>
            <tr>
                <th>Nombre</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

