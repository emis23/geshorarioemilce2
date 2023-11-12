@extends('layouts.app')

@section('content')

	<div class="container">

		<div class="panel-heading text-center">
			<h3 class="panel-title">Lista de asistencias</h3>
		</div>


		<table class="table table-hover" id="mitabla">
			<thead>
				<tr>
					<th scope="col">Sede</th>
					<th scope="col">Apellido y Nombre</th>
					<th scope="col">Fecha</th>
				</tr>
			</thead>
			<tbody>
				@foreach($regs as $reg)
				<tr>
					<td scope="row">{{ $reg->nombresede}}</td>
					<td>{{ $reg->apellidonombre}}</td>
					<td>{{ $reg->created_at}}</td>
				</tr>
			@endforeach
			</tbody>
		</table>

	</div>

@endsection()

@section('scrip')

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
		 dom: '<"toolbar">ftip',
		 language: {
         	url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
    },
	});

	$('div.toolbar').html('');

});

</script>

@endsection()