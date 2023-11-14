<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

use App\Models\asistencia;  

class AsistenciasController extends Controller
{     

	public function index()
	{
		// Lista de Asistencia - Pantalla Principal

		// http://localhost/geshorario/public/asistencias/index

	
  		$regs = Asistencia::join('users', 'asistencias.profesor_id' , '=', 'users.id')
					->join('sedes', 'asistencias.sede_id' , '=', 'sedes.id')
  		            ->select( 'sede_id','asistencias.created_at as created_at' , 'users.name' , 'users.apellidonombre as apellidonombre' , 'sedes.nombre as nombresede' )
					->orderBy('asistencias.id', 'ASC')->paginate(1000); 

		return view('asistencias.index')->with('regs', $regs );		

	}




} // Fin Controller