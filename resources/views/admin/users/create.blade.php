@extends('layouts.general')
@section('content')
    @if($errors->any())
        <div class="alert-error row justify-between">
            Revisa los errores en los campos
            <span class="close">X</span>
        </div>
    @endif

    <form action="{{route('usuarios.store')}}" method="post" class="row justify-center m-t-24">
        {{csrf_field()}}
        <div class="col-16 col-m-14 col-l-10">
            <h2>Crear un nuevo usuario</h2>

            <div>
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" value="{{old('name')}}" required
                       @if ($errors->has('name')) class="error" @endif>
                @if ($errors->has('name'))<span class="error">{{ $errors->first('name') }}</span>@endif
            </div>

            <div class="m-t-24">
                <label for="last_name">Apellido</label>
                <input name="last_name" type="text" value="{{old('last_name')}}" required
                       class=" @if($errors->has('last_name')) error @endif " id="last_name">
                @if ($errors->has('last_name'))<span class="error">{{ $errors->first('last_name') }}</span>@endif
            </div>

            <div class="m-t-24">
                <label for="email">E-mail</label>
                <input name="email" type="email" value="{{old('email')}}" required
                       class=" @if($errors->has('email')) error @endif " id="email">
                @if ($errors->has('email'))<span class="error">{{ $errors->first('email') }}</span>@endif
            </div>

            <div class="m-t-24 password-view">
                <label for="password">Contraseña</label>
                <input name="password" type="password" value="{{old('password')}}" required
                       class=" @if($errors->has('password')) error @endif " id="password">
                @if ($errors->has('password'))<span class="error">{{ $errors->first('password') }}</span>@endif
                <i id="viewPassword"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48"><path d="M24 9C14 9 5.46 15.22 2 24c3.46 8.78 12 15 22 15s18.54-6.22 22-15C42.54 15.22 34.01 9 24 9zm0 25c-5.52 0-10-4.48-10-10s4.48-10 10-10 10 4.48 10 10-4.48 10-10 10zm0-16c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6z"/></svg></i>
            </div>

            <div class="m-t-24">
                <label for="role">Roles</label>
                <select name="role" id="role" required>
                    <option value="">Elegir rol</option>
                    @foreach($roles as $key => $role)
                        <option {{(old('rol') == $key)?'selected':''}} value="{{$key}}">{{$role}}</option>
                    @endforeach
                </select>
                @if ($errors->has('role'))<span class="error">{{ $errors->first('role') }}</span>@endif
            </div>

            <div class="m-t-24">
                <button class="is-full-width">Agregar usuario</button>
            </div>
        </div>
    </form>
@endsection