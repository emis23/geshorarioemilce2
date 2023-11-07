@extends('layouts.app')
@section('titulo', 'Nuevo Usuario')
@section('content')

<div class="container">

	<div class="row">

		<div class="col-12 mb-4">

			<div class="text-center shadow-lg p-2 bg-body-tertiary rounded">
				<h3 class="fw-bold">Nuevo usuario</h3>
			</div>

		</div>

		<div class="col-12 mb-4 fw-bold">

			<form method="POST" action="{{ route('users.store') }}" class="shadow-lg p-2 bg-body-tertiary rounded">
				@csrf

				<div class="mb-4">
					<label class="form-label">Usuario</label>
					<input id="name" type="text" name="name" class="form-control" placeholder = "Usuario123" required>
				</div>

				<div class="mb-4">
					<label class="form-label">Contraseña</label>
					<input id="password" type="password" name="password" class="form-control" placeholder = "*********" required>
				</div>
				
				<div class="mb-4">
					<label class="form-label">Apellido y Nombre</label>
					<input id="apellidonombre" type="text" name="apellidonombre" class="form-control" placeholder = "Apellido y nombre" required>
				</div>

				<div class="mb-4">
					<label class="form-label">Email</label>
					<input id="email" type="email" name="email" class="form-control" placeholder="ejemplo@email.abc" required>
				</div>

				<div class="mb-4">
					<label class="form-label">Perfil</label>
					{!! Form::select('perfil_id', $perfiles, null, ['class' => 'form-select', 'placeholder' => 'Seleccione una opcion...', 'required']) !!}
				</div>

				<div class="mb-1">
					<button type="submit" class="btn btn-success fw-bold">Aceptar</button>
					<button type="button" class="btn btn-primary fw-bold" data-dismiss="modal" onClick=" window.history.back()">Cancelar</button>
				</div>
				
			</form>   

		</div>

	</div>

</div>

@endsection