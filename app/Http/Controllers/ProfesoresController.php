<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use App\Models\User;

// use App\Models\profesor;  

class ProfesoresController extends Controller
{

  public function registro ()  {

    //probar:  http://localhost/geshorario/public/profesores/registro


    return view('profesores.registro'  );

  } // Fin registro 

  public function registro_graba(Request $request)
  {
    $data = User::where('dni', '=', $request -> dni)
     ->select ('dni', 'name')->first();

      /* dd($data); */
      //  Boton Aceptar de la vista registro


      // $datos = profesor::buscarDni($resquest->dni);
      $datos = (object) ['dni'=> $request->dni,
             'apellido'=> $request->name,];

            
      if ($request->dni == 1){
          flash::error("Error: No esta Registrado " );
          return view('profesores.registro' );
      } else {
          return view('profesores.registro_confirmacion',[ 'datos' => $data ] );
      }
     
  }

} // Fin Controller