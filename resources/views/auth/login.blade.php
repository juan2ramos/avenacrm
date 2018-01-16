@extends('layouts.general')

@section('content')

    <form class="row form-login justify-center  align-center" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="row">
            <div>
                <label for="email">E-Mail</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))<span>{{ $errors->first('email') }}</span>@endif
            </div>
            <div class="m-t-32">
                <label for="password">Contaseña</label>
                <input id="password" type="password" class="form-control" name="password" required>
                @if ($errors->has('password'))<span>{{ $errors->first('password') }}</span> @endif
            </div>
            <button type="submit" class="btn btn-primary is-full-width m-t-l-24 is-text-uppercase">
                ingresar
            </button>
            <div class="row justify-end p-t-l-12">
                <input id="check" {{ old('remember') ? 'checked' : '' }} name="remember" type="checkbox">
                <label for="check" class="p-r-12">Recuerdame</label><br>
                <a href="{{ route('password.request') }} ">Olvide la contraseña?</a>
            </div>


        </div>
    </form>

@endsection
