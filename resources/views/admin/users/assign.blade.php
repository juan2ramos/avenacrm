@extends('layouts.general')
@section('content')
    @if($errors->any())
        <div class="alert-error row justify-between">
            Revisa los errores en los campos
            <span class="close">X</span>
        </div>
    @endif
    <form action="{{route('assign.create')}}" method="post" class="row justify-center m-t-24">
        {{csrf_field()}}
        <div class="col-16 col-m-14 col-l-10">
            <h2>Asignar un punto al usuario {{$user->name}} </h2>

            @if($user->assign)
                <p>Este usuario tiene asignado el punto {{$user->assign->name}}</p>
            @endif

            <div class="m-t-24">
                <label for="point">Selecciona un punto</label>
                @php($assign = optional($user->assign)->id)
                <select name="point" id="point" required>
                    <option value="">Elegir punto</option>
                    @foreach($points as $key => $point)
                        <option {{(old('point') == $key)?'selected':(($assign == $key) ? 'selected' : '')}} value="{{$key}}">{{$point}}</option>
                    @endforeach
                </select>
                @if ($errors->has('point'))<span class="error">{{ $errors->first('point') }}</span>@endif
            </div>

            <div class="m-t-24">
                <button class="is-full-width">Asignar punto</button>
            </div>
        </div>
    </form>
@endsection