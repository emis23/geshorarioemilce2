<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

// use App\Models\profesor;  

class ProfesoresController extends Controller
{

  public function registro ()  {

    //probar:  http://localhost/geshorario/public/profesores/registro


    return view('profesores.registro'  );

  } // Fin registro 

  public function registro_graba(Request $request)
  {
      // Boton Aceptar de la vista registro

     // $datos = profesor::buscarDni($request->dni);

     $datos =  (object) [ 'dni' => $request->dni ,
                'apellido' => $request->apellido,
                'fecha_entrada' => $request->fecha_entrada,
                'hora_entrada' => $request->hora_entrada,
                'password' => $request->password,
              ];

      if ($request->dni == 1 ) {
          Flash::error("Error: No esta Registrado" );
          return view('profesores.registro'  );

      } else {
         return view('profesores.registro_confirmacion', [ 'datos' => $datos ]  );          
      }        

  }

} // Fin Controller