@extends('layouts.app')

@section('content')
	<div class="container">
	    <table id="mitabla" class='table table-striped table-bordered shadow-lg mt-4 table-hover' style='width:100%'>
			<input type="date" id="fechadesde">
			<input type="date" id="fechahasta">
		<!-- <table class="table panel-heading text-center" > -->

		<div class="panel-heading text-center">
			<h3 class="panel-title">Lista de asistencias </h3>
		</div>
		<div> 
		<div style="width: 20%;" class=""> 
		<label ></label>
			<input type="text" id="inputapellido"  class= "form-control"placeholder="Buscar Apellido" data-index="1">                 
		           
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
					<td>{{ $reg->name}}</td>
					<td>{{ $reg -> created_at}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@endsection()

@section('script')

<script>

// Si definimos asi va para todas las tablas del proyecto
$.extend(true, $.fn.dataTable.defaults, {
	searching: true,
	ordering: true, 
});

$(document).ready(function () {

   //Inicia con valores por defecto  $('#mitabla').DataTable();

   // Definimos para 1 tabla en particular
	const table = $('#mitabla').DataTable({
		 language: {
        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
    	},
	});

	$("#fechadesde, #fechahasta").on('input', function () {
    // Obtén los valores de los campos de fecha
    var fechaDesde = $("#fechadesde").val();
    var fechaHasta = $("#fechahasta").val();
	

	$.fn.dataTable.ext.search.push(
		function (settings, data, dataIndex) {
			var fechaTabla = data[2]; // Ajusta el índice de la columna según tu estructura
		// Realiza la comparación para determinar si está en el rango
		return (fechaDesde === '' || fechaHasta === '' || (fechaTabla >= fechaDesde && fechaTabla <= fechaHasta));
		}
	);
	// Vuelve a dibujar la tabla
	table.draw();
	
	// Elimina la función de filtrado personalizado después de la búsqueda
	$.fn.dataTable.ext.search.pop();
		dom: 'rtip',
			language: {
			url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
		},
	});
	
	
	$('div.toolbar').html('');

	$("#inputapellido").keyup(function() {
        table.column($(this).data("index")).search(this.value).draw();
    });
});



</script>


@endsection()
<!-- 
<div class="panel-heading text-center">
			<h3 class="panel-title">Lista de Asistencias</h3>
		</div>
		 <div style="width: 20%;" class=""> 
			<label ></label>
			<input type="text" id="inputapellido"  class= "form-control" placeholder="Buscar apellido" data-index="1">
		<div> 
		<input type="date" id="fechadesde">
		<input type="date" id="fechahasta">
	</div>

	$('div.toolbar').html('');
		$("#inputapellido").keyup(function() {
			table.column($(this).data("index")) search(this.value).draw();
	});

	$("#fechadesde, #fechahasta").on('input', function () {
    // Obtén los valores de los campos de fecha
    var fechaDesde = $("#fechadesde").val();
    var fechaHasta = $("#fechahasta").val();


    // Aplica la búsqueda mediante la función de filtrado personalizado
    $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var fechaTabla = data[2]; // Ajusta el índice de la columna según tu estructura
		// Realiza la comparación para determinar si está en el rango
		return (fechaDesde === '' || fechaHasta === '' || (fechaTabla >= fechaDesde && fechaTabla <= fechaHasta));
		}
		);

		// Vuelve a dibujar la tabla
		table.draw();

		// Elimina la función de filtrado personalizado después de la búsqueda
		$.fn.dataTable.ext.search.pop();
	}),
 -->