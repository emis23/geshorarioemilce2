@extends('layouts.app')

@section('content')

<section class="container py-1">

    <div class="row">
        <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
                @include('flash::message')
            </div>
        <div class="col-md-4"></div>
    </div>

<div class="row justify-content-center ">
  <div class="col-lg-5 col-md-6">
    <div class="card mb-4 border-primary border border-4">
      <div class="card-body bg-black text-white">
        <div class="text-center">
          <img src="{{ asset('img/isfdlogo.png') }}"class="rounded" width="150" alt="">
        </div>
        <h5 class="card-title">Registro de Entrada/Salida</h5>
        <form method="POST" action="{{ route('profesores.registro_graba') }}">
            @csrf
            
            <p>FECHA: <h7 class="" id="fecha_entrada" name='fecha_entrada' onload="showDate();"></h7></p>
            <p>HORA: <h7 class="" id="hora_entrada" name='hora_entrada' onload="showTime();"></h7></p>

            <div class="input-group input-group-sm mb-3 d-none">
                <input class="" id="fecha_entrada" name='fecha_entrada' onload="showDate();">
                <input class="" id="hora_entrada" name='hora_entrada' onload="showTime();">
            </div>

            <div class="input-group input-group-sm mb-3">
              <input id="dni" type="text" name="dni" class="form-control" value="" placeholder="Ingrese Dni" aria-label="Sizing example input"aria-describedby="inputGroup-sizing-sm" required  autofocus></p>
            </div>
            
            <div class="input-group input-group-sm mb-3">
              <input id="apellido" type="text" name="apellido" class="form-control" value="" placeholder="Ingrese apellido" aria-label="Sizing example input"aria-describedby="inputGroup-sizing-sm" required></p>
            </div>
            
            <div class="input-group input-group-sm mb-3">
              <input id="password" type="password" class="form-control" name="password" value="" placeholder="Ingrese Contraseña" aria-label="Sizing example input"aria-describedby="inputGroup-sizing-sm" required>
            </div>
            
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary btn-block">Ingresar datos</button>
                <br>
                <a class="text-secondary" href="/register">¿Olvidaste tu contraseña? Haz click aquí</a>
            </div>
        </form> 
      </div>
    </div>
  </div>
</div>
</section>

<!-- 
<div class="container">
	<div class="row">
		
        <div class="col-12 mb-4">

			<div class="text-center shadow-lg p-2 bg-body-tertiary rounded">
                <h3 class="fw-bold">Registro de Entrada / Salida</h3>
			</div>

		</div>

		<div class="col-3"></div>

        <div class="col-6 mb-4 fw-bold">

            <form class="" method="POST" action="{{ route('profesores.registro_graba') }}">
                @csrf

                <div class="shadow-lg p-2 bg-body-tertiary rounded m-3">
                    
                    <ul class="list-group list-group-flush text-center">

                        <li class="list-group-item" id="MyClockDate" onload="showDate();" id="fecha_entrada" name="fecha_entrada"></li>
                        <li class="list-group-item" id="MyClockTime" onload="showTime();" id="hora_entrada" name="hora_entrada"></li>

                    </ul>
                
                </div>

                <div class="shadow-lg p-2 bg-body-tertiary rounded m-3">

                    <div class="mb-4">
                        <label for="form-label">DNI</label>
                        <input id="dni" type="text" name="dni" class="form-control" value="" required  autofocus>
                    </div>
                    
                    <div class="mb-4">
                        <label for="form-label">Contraseña</label>
                        <input id="password" type="password" class="form-control" name="password" value="" required>
                    </div>

                    <div class="mb-1 text-center">
                        <button type="submit" class="btn btn-success btn-block">Ingresar</button>
                    </div>

                </div>
                    
            </form> 

		</div>

		<div class="col-3"></div>

	</div>
</div>
-->

<!-- OTRAS VERSIONES PARA PROBAR CUAL QUEDA MEJOR -->

<!-- 
<section class="container py-1">
    <div class="row justify-content-center ">
        <div class="col-lg-5 col-md-6">
            <div class="card mb-4 shadow-lg p-2 bg-body-tertiary rounded">
                <div class="card-body">

                    <div class="text-center">
                        <img src="{{ asset('img/isfdlogo.png') }}"class="rounded" width="150" alt="">
                    </div>

                    <h5 class="card-title">Registro de Entrada/Salida</h5>
                    <form method="POST" action="{{ route('profesores.registro_graba') }}">
                        @csrf
                        
                        <p>FECHA: <h7 class="" id="MyClockDate" onload="showDate();"></h7></p>
                        <p>HORA: <h7 class="" id="MyClockTime" onload="showTime();"></h7></p>
                        
                        <div class="input-group input-group-sm mb-3">
                            <input id="dni" type="text" name="dni" class="form-control" value="" placeholder="Ingrese Dni" aria-label="Sizing example input"aria-describedby="inputGroup-sizing-sm" required  autofocus></p>
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <input id="password" type="password" class="form-control" name="password" value="" placeholder="Ingrese Contraseña" aria-label="Sizing example input"aria-describedby="inputGroup-sizing-sm" required>
                        </div>
                        <div class="card-footer text-center m-3">
                            <button type="submit" class="btn btn-primary btn-block">Ingresar datos</button>
                            <br><br>
                            <a class="text-secondary" href="/register">¿Olvidaste tu contraseña? Haz click aquí</a>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</section>
 -->

@endsection

@section('script')

<script>

 
    $(document).ready(function () {
        showDate();
        showTime();
        $('#loginModal').modal('show');

    });

        function showTime() {
            const now = dayjs();

            let h = now.hour();
            let m = now.minute();
            let s = now.second();

            if (h == 0 && m == 0 && s == 0) {
                showDate();
            }

            h = (h < 10) ? "0" + h : h;
            m = (m < 10) ? "0" + m : m;
            s = (s < 10) ? "0" + s : s;

            const time = h + ":" + m + ":" + s;
            document.getElementById("hora_entrada").textContent = time;

            setTimeout(showTime, 1000);
        }

        function showDate() {
            const now = dayjs();

            let d = now.date();
            let m = now.month() + 1;
            let y = now.year();

            d = (d < 10) ? "0" + d : d;
            m = (m < 10) ? "0" + m : m;

            const date = d + "/" + m + "/" + y;
            document.getElementById("fecha_entrada").textContent = date;
        }

</script>

@endsection()    