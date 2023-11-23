@extends('template.main')

@section('titulo', 'Cambio de Contraseña')

@section('contenido')

<form method="post" action="{{url('user/updatepassword')}}">
 {{csrf_field()}}
 <div class="form-group">
  <label for="mypassword">Contraseña Actual:</label>
  <input type="password" name="mypassword" class="form-control">
  <div class="text-danger">{{$errors->first('mypassword')}}</div>
 </div>
 <div class="form-group">
  <label for="password">Contraseña Nueva:</label>
  <input type="password" name="password" class="form-control">
  <div class="text-danger">{{$errors->first('password')}}</div>
 </div>
 <div class="form-group">
  <label for="mypassword">Repetir Nueva Contraseña:</label>
  <input type="password" name="password_confirmation" class="form-control">
 </div>
 <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
</form>

@endsection