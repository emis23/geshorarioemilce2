@extends('layouts.app')

@section('titulo', 'Editar Usuario '. $user->name)

@section('content')

<div class="container">

	<div class="row">

		<div class="col-12 mb-4">

			<div class="text-center shadow-lg p-2 bg-body-tertiary rounded">
				<h3 class="fw-bold">Editar usuario</h3>
			</div>

		</div>

		<div class="col-12 mb-4">

			<div class="shadow-lg p-2 bg-body-tertiary rounded fw-bold">

				{!! Form::open(['route' => ['users.update', $user], 'method' => 'PUT']) !!}

				<div class="mb-4">
					<label class="form-label">Usuario</label>
					<input id="name" type="text" name="name" class="form-control" value="{{$user->name}}" placeholder = "Nombre Completo" required>
				</div>

				<div class="mb-4">
					<label class="form-label">Apellido y Nombre</label>
					<input id="apellidonombre" type="text" name="apellidonombre" class="form-control" value="{{$user->name}}" placeholder = "Apellido y Nombre" required>
				</div>

				<div class="mb-4">
					<label class="form-label">Perfil</label>
					{!! Form::select('perfil_id', $perfiles, $user->perfil_id, ['class' => 'form-control', 'required']) !!}
				</div>

				<div class="mb-4">
					<label class="form-label">Estado</label>
					{!! Form::select('estado_id', $estados, $user->estado_id, ['class' => 'form-select', 'required']) !!}
				</div>

				<div class="mb-1">
					<button type="submit" class="btn btn-success fw-bold">Aceptar</button>
					<button type="button" class="btn btn-primary fw-bold" data-dismiss="modal" onClick=" window.history.back()">Cancelar</button>
				</div>

				{!! Form::close() !!}
			
			</div>

		</div>
	
	</div>

</div>
			
@endsection