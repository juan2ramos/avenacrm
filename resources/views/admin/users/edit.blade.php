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
    @if(session('userMe'))
        <div class="alert-warning row justify-between">
            No puedes eliminar tu usuario
            <span class="close">X</span>
        </div>
    @endif
    <form action="{{route('usuarios.destroy', $user->id)}}" method="post" id="delete">
        {{csrf_field()}}
        {{ method_field('DELETE') }}
    </form>
    <form action="{{route('usuarios.update',$user->id)}}" method="post" class="row justify-center m-t-24">
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <div class="col-16 col-m-14 col-l-10">
            <div class="row justify-between align-center">
                <h2>Editar {{$user->name}}</h2>
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
                       value="{{old('name')?old('name'):$user->name}}"
                       @if ($errors->has('name')) class="error" @endif
                >
                @if ($errors->has('name'))<span class="error">{{ $errors->first('name') }}</span>@endif
            </div>

            <div class="m-t-24">
                <label for="last_name">Apellido</label>
                <input name="last_name" required
                       type="text"
                       id="last_name"
                       value="{{old('last_name')?old('last_name'):$user->last_name}}"
                       class=" @if($errors->has('last_name')) error @endif ">
                @if ($errors->has('last_name'))<span class="error">{{ $errors->first('last_name') }}</span>@endif
            </div>

            <div class="m-t-24">
                <label for="email">E-mail</label>
                <input name="email" required
                       type="email"
                       id="email"
                       value="{{old('email')?old('email'):$user->email}}"
                       class=" @if($errors->has('email')) error @endif ">
                @if ($errors->has('email'))<span class="error">{{ $errors->first('email') }}</span>@endif
            </div>

            <div class="m-t-24 password-view">
                <label for="password">Contraseña (dejar en blanco si no desea cambiar la contraseña)</label>
                <input name="password" type="password"
                       class=" @if($errors->has('password')) error @endif " id="password">
                @if ($errors->has('password'))<span class="error">{{ $errors->first('password') }}</span>@endif
                <i id="viewPassword">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48">
                        <path d="M24 9C14 9 5.46 15.22 2 24c3.46 8.78 12 15 22 15s18.54-6.22 22-15C42.54 15.22 34.01 9 24 9zm0 25c-5.52 0-10-4.48-10-10s4.48-10 10-10 10 4.48 10 10-4.48 10-10 10zm0-16c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6z"/>
                    </svg>
                </i>
            </div>

            <div class="m-t-24">
                <label for="role">Roles
                    @if(Auth::user()->id == session('userId')) (No puedes cambiar de rol a tu usuario) @endif
                </label>
                <select name="role" id="role" required
                        @if(Auth::user()->id == session('userId')) disabled @endif >
                    <option value="">Elegir rol</option>
                    @php( $roleOption = old('role')?old('role'): optional($user->roles->first())->id)
                    @foreach($roles as $key => $role)
                        <option {{ $roleOption == $key?'selected':''}} value="{{$key}}">{{$role}}</option>
                    @endforeach
                </select>
                @if ($errors->has('role'))<span class="error">{{ $errors->first('role') }}</span>@endif
            </div>


            <div class="m-t-24">
                <button class="is-full-width">Actualizar usuario</button>
            </div>
        </div>
    </form>
@endsection