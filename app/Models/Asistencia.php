<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model {

	//

	protected $table = "asistencias";
	protected $fillable = ['profesor_id' , 'sede_id']; 

}
