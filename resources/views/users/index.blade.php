@extends('layouts.app')

@section('content')

	<div class="container">

		<div class="row">

			<div class="col-12 mb-4">
				@if(Auth::user() -> perfil_id == 'ADM')
					<div class="text-center shadow-lg p-2 bg-body-tertiary rounded">
						<h3 class="fw-bold">Lista de usuarios</h3>
					</div>
				
			</div>

			<div class="col-2 mb-4">

				<div class="panel-bottom mt-2">
					<a href="{{ route('users.create')}}" class="pull-right btn btn-success fw-bold"> <i class="bi bi-person-fill-add m-1"></i> Nuevo Usuario</a>
				</div>

			</div>


			<div class="col-12 mb-4">

				<table class="table table-hover shadow-lg p-2 bg-body-tertiary rounded" id="mitabla">
					<thead>
						<tr>
							<th scope="col">Id</th>
							<th scope="col">Usuario</th>
							<th scope="col">Apellido y Nombre</th>
							<th scope="col">Email</th>
							<th scope="col">Tipo</th>
							<th scope="col">Estado</th>
							<th scope="col">Accion</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td scope="row">{{ $user->id}}</td>
							<td>{{ $user->name}}</td>
							<td>{{ $user->apellidonombre}}</td>
							<td>{{ $user->email}}</td>
							<td>
								@if($user->perfil_id == 'ADM')
									<span class="label label-danger">{{ $user->perfil_nombre }}</span>
								@else
									<span class="label label-primary">{{ $user->perfil_nombre }}</span>
								@endif
							</td>					
							<td>{{ $user->estado_nombre}}</td>
							<td>
								<a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"> <i class="bi bi-pencil"></i> </a> 
								<a href="{{ route('user.destroy', $user->id) }}" onclick="return confirm('Seguro de Eliminar Usuario')" class="btn btn-danger"> <i class="bi bi-trash"></i> </a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>

			</div>
			@else 
	
				<h1></h1>
				<div class="row justify-content-center"> 		</div>
                <div class="col-lg-6"> 		</div>
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <h5 class="text-center">BIENVENIDO USUARIO</h5  
								class="list-group"> 
						<div class="text-center">
          					<img src="{{ asset('img/isfdlogo.png') }}"class="rounded" width="200" alt="200">
       					 </div>								
							
				
			@endif

		</div>
	</div>
	

@endsection()

@section('script')

<script>

// Si definimos asi va para todas las tablas del proyecto
$.extend(true, $.fn.dataTable.defaults, {
	searching: false,
	ordering: true, 
});

$(document).ready(function () {

   //Inicia con valores por defecto  $('#mitabla').DataTable();

   // Definimos para 1 tabla en particular
	$('#mitabla').DataTable({
		searching: true,
		dom: '<"col-md-1"f> tlp',
		language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
    	},
	});

	$('div.toolbar').html('');

});


// </script>

// @endsection()