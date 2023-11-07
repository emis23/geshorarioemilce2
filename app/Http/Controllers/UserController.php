<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Perfil;  // Modelo Relacionado
use App\Models\Estado_usuario;  // Modelo Relacionado

use Hash;  // Para validar la clave en la pantalla de cambio
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class UserController extends Controller {

	public function __construct(){
        $this->middleware('auth');
    }

	public function index()
	{
		// Lista los usuarios - Pantalla Principal

		// 1)-  Asi hace bien en solo 1 instruccion , pero no se puede user la funcion paginate()	
		//  $consulta= "SELECT * FROM users join perfiles on users.perfil_id=perfiles.id " ;
        //  $users = \DB::select($consulta);

		//	2)- Asi anda bien todo, pero muchos select, 1 por cada relacion ya	 registro 
		  	//   $users = User::orderBy('id', 'ASC')->paginate(10);	
   			// No es necesario , al estar relacionadas ya hace
			//	$users->each(function($users){
			//		$users->perfil;  //Recupera las relaciones , hace un select a la tabla relacionada por c/registro
			//	});

		// 3)- Hace un join , puede paginar	, pero tiene el problema que si hay campos con el mismo nombre deja el relacionado (ej id), por lo que hay que espesificar el select

  		$users = User::join('perfiles', 'users.perfil_id', '=', 'perfiles.id')
			  ->join('estados_usuario', 'users.estado_id', '=', 'estados_usuario.id')	
  		      ->select( 'users.id','name','apellidonombre' ,'email' , 
  		      	'perfil_id','perfiles.nombre as perfil_nombre', 'estados_usuario.nombre as estado_nombre'  ) 
  			  ->orderBy('users.name', 'ASC')->paginate(1000);

		return view('users.index')->with('users', $users );		

	}


	public function create()
	{
		//LLamar a la Pantalla de Alta
        $perfiles = Perfil::orderBy('nombre', 'ASC')->pluck( 'nombre','id'); // Para cargar el select
		return view('users.create')->with('perfiles', $perfiles);
	}


	public function store(Request $request)
	{	
		//  Inserta el registro en la Tabla

		//  La validacion **PENDIENTE VER TEMA DE MOSTRAR MSG **
		$this->validate($request, [
			'name'	=>	'min:2|max:50|required|unique:users',
			'password'	=>	'min:4|max:50|required',
		    'perfil_id'	=>	'required',
    	]);
		
		$user = new User($request->all());
		$user->estado_id = 1; //Por defecto Activo 
		$user->password = bcrypt($request->password); // Para encriptar contraseña
		$user->save();

	 	Flash::success("Se ha registrado ". $user->name ." de manera exitosa ! Id:" . $user->id );

		return redirect()->route('users.index');

	}

	public function show($id)
	{
		// Tiene que estar, lo utiliza para mostrar el index
	}

	public function edit($id)
	{
		// LLamar a la ventana de Modificar
		$user = User::find($id);

        $perfiles = Perfil::orderBy('nombre', 'ASC')->pluck( 'nombre','id'); // Para cargar el select
        $estados = Estado_usuario::orderBy('nombre', 'ASC')->pluck( 'nombre','id'); // Para cargar el select
		return view('users.edit' , [ 'user' => $user , 'perfiles' => $perfiles , 'estados' => $estados ] );
	}

	public function update(Request $request, $id)
	{

		// Boton Acepta la Modificacion		
		$this->validate($request, [
        	'name' => 'required|max:9',
        	'perfil_id' => 'required',
    	]);

		$user = User::find($id);
		$user->fill($request->all());
		/*  Se puede usar el metodo fill para pasar todos los valores de una
		$user->name = $request->name;
		$user->tipo = $request->tipo;
		*/
		$user->save();

		Flash::success('El usuario '. $user->name .' ha sido editado con exito');
		return redirect()->route('users.index');
	}

	public function destroy($id)
	{
		// Boton Eliminar
		$user = User::find($id);
		$user->delete();
		Flash::error('El usuario '. $user->name ." ha sido borrado de forma exitosa");
		return redirect()->route('users.index');
	}

    public function password(){
        return View('users.password');
    }

	public function updatePassword(Request $request){

        $reglas = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:4|max:18',
        ];
        $messages = [
            'mypassword.required' => 'La Contaseña Actual es requerida',
            'password.required' => 'El campo es requerido',
            'password.confirmed' => 'Las Contraseñas Nuevas no coinciden',
            'password.min' => 'El mínimo permitido son 4 caracteres',
            'password.max' => 'El máximo permitido son 18 caracteres',
        ];
 	    $this->validate($request,$reglas,$messages);
       
 	    // Comprueba la contraseña actual
        if (Hash::check($request->mypassword, Auth::user()->password)){
            $user = new User;
            $user->where('name', '=', Auth::user()->name)
                 ->update(['password' => bcrypt($request->password)]);
      //** ver no sale msg de confirmacion **
			Flash::success('El usuario '. $user->name .' Cambio Contraseña con éxito');
			return redirect()->route('home');
        } else {
			Flash::error('Credenciales incorrectas');
			return redirect('user/password');
        }

    } //Fin Update Password

} // Fin de Controller