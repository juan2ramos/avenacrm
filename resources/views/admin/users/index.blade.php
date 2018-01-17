@extends('layouts.general')
@section('content')
    @if(session('deleteUser'))
        <div class="alert-success row justify-between ">
            Usuario eliminado
            <span class="close">x</span>
        </div>
    @endif
    @if(session('assign'))
        <div class="alert-success row justify-between ">
            Usuario asignado
            <span class="close">x</span>
        </div>
    @endif
    <div class="m-t-20 m-b-40">
        <h2>Usuarios</h2>
        <a href="{{route('usuarios.create')}}">
            <h3 class="row align-center justify-end">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48">
                    <path fill="#002c81"
                          d="M40 12H24l-4-4H8c-2.21 0-3.98 1.79-3.98 4L4 36c0 2.21 1.79 4 4 4h32c2.21 0 4-1.79 4-4V16c0-2.21-1.79-4-4-4zm-2 16h-6v6h-4v-6h-6v-4h6v-6h4v6h6v4z"/>
                </svg>
                <span class="p-l-4">Agregar un nuevo usuarios</span>
            </h3>
        </a>
    </div>
    <div class="table-container m-t-a-12">
        <table>
            <thead>
            <tr>
                <th width="40px">ID</th>
                <th>Nombre</th>
                <th>email</th>
                <th>Rol</th>
                <th class="is-text-center">Asignar</th>
                <th class="is-text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td width="40px">{{$user->id}}</td>
                    <td>{{$user->name . ' ' . $user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{ optional($user->roles->first())->name}}</td>
                    <td class="is-text-center">
                        @if($user->roles->first()->name == 'Auxiliar')
                            <a class="p-l-24" href="{{route('assign',$user->id)}}">
                                {{($user->assign)?$user->assign->name:'Asignar Punto'}}
                            </a>
                        @endif
                    </td>
                    <td class="row justify-center">
                        <a class="row align-center justify-center" href="{{route('usuarios.edit',$user->id)}}">
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

