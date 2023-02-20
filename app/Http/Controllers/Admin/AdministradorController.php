<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Controller;
use App\Mail\ContraseñaAdminRecibida;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdministradorController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.administradores.index')->only('index');
        $this->middleware('can:admin.administradores.create')->only('create');
        $this->middleware('can:admin.administradores.edit')->only('edit');
        $this->middleware('can:admin.administradores.show')->only('show');
        $this->middleware('can:admin.administradores.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $administradores = User::all()->where('type',User::ADMIN);
        return view('admin.administradores.index', compact('administradores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','id')->toArray(); //envia el array de todos los roles, sirve para el select
        return view('admin.administradores.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datenow = date("Y-m-d"); //Fecha de hoy, para la validación
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Email' => 'required|string|max:255|email|unique:users,email',
            'Fecha'=>'required|after_or_equal:'.$datenow, //La fecha ingresada no puede ser menor a la de hoy

        ]);
        $password = Str::random(8);
        $administrador = User::create([
            'name' => $request->input('Nombre'),
            'type' => User::ADMIN,
            'email' => $request->input('Email'),
            'expiration_date' => $request->input('Fecha'),
            'password' => Hash::make($password),
        ])->assignRole($request->input('Rol'));
        
        $correo = [
            'Nombre' => $request->input('Nombre'),
            'Password' => $password,
            'Fecha' => $request->input('Fecha'),
            'Rol' => str_replace(array('"', '[', ']'),'',$administrador->getRoleNames())
        ];

        //Se envia la contraseña al nuevo administrador
        
        Mail::to($request->input('Email'))->queue(new ContraseñaAdminRecibida($correo));

        return redirect()->route('admin.administradores.index')->with('info', $administrador->NombreAdm. ' se ha registrado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idAdministrador)
    {
        $administrador = User::find($idAdministrador);
        $roles = Role::pluck('name','id')->toArray(); //envia el array de todos los roles, sirve para el select
        return view('admin.administradores.edit', compact(['administrador', 'roles']));
    }

    /**
     * Muestra la vista de editar perfil del administrador
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProfile($idAdministrador)
    {
        $administrador = User::find($idAdministrador);
        return view('admin.administradores.editProfile', compact('administrador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $administrador = User::find($id);
        $datenow = date("Y-m-d"); //Fecha de hoy, para la validación
        $request->validate([
            'Fecha'=>'required|after_or_equal:'.$datenow, //La fecha ingresada no puede ser menor a la de hoy

        ]);
        $administrador->roles()->sync($request->roles);
        $administradores = User::all();
        return redirect()->route('admin.administradores.index', compact('administradores'))->with('info', 'El Rol se ha actualizado con éxito');
    }

    /**
     * Funcion para actualizar los datos del Administrador
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request, $id)
    {
        $administrador = User::find($id);
        $request->validate([
            'Nombre' => 'required|string',
            'Email' => "required|email|max:255|unique:administradores,email,$administrador->idAdministrador,idAdministrador",
        ]);

        $administrador->update([
            'name' => $request->input('Nombre'),
            'email' => $request->input('Email')
        ]);

        return redirect()->route('admin.home')->with('info', 'Su perfil se ha actualizado con éxito');
    }

    /**
     * Funcion para actualizar la contraseña del administrador
     */
    public function updatePassword(Request $request)
    {
        
        # Validacion
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);


        #Compara la contraseña registrada en la bd con la indicada en el campo
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "La contraseña antigua no coincide con la contraseña registrada!");
        }

        
        #Actualiza la contraseña
        User::where('id','=',auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);
        
        return redirect()->route('admin.home')->with("info", "Contraseña actualizada correctamente");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $name = $admin->name;
        if($admin->getRoleNames()[0] == 'Administrador'){
            return redirect()->route('admin.administradores.index')->with("info", 'El administrador '.$name.' no se puede eliminar');
        }
        $admin->delete();
        return redirect()->route('admin.administradores.index')->with("info", 'El '.$admin->getRoleNames()[0].' | '.$name.' ha sido eliminado');
    }
}
