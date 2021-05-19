<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\Models\Log\LogSistema;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:VerUsuario')->only('index');
        $this->middleware('permission:RegistrarUsuario')->only('create');
        $this->middleware('permission:RegistrarUsuario')->only('store');
        $this->middleware('permission:EditarUsuario')->only('edit');
        $this->middleware('permission:EditarUsuario')->only('update');
        $this->middleware('permission:VerUsuario')->only('show');
    }

    public function index(Request $request)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name . ' Ha ingresado a ver los usuarios a las: '
            . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();


        $users = User::with('roles')->with('permissions')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.users.index', compact('users'));
    }




    public function create()
    {

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name . ' Ha ingresado a crear un usuario a las: '
            . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.users.create');
    }




    public function store(StoreUser $request)
    {
        $user = User::create($request->except('role'));

        if ($request->has('role')) {
            $user->assignRole($request->role);
        }

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name . ' Ha registrado en el sistema al usuario: ' . $request->name . ' ' . $request->lastname . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return redirect()->route('admin.users.edit', ['user' => $user]);
    }




    public function show(User $user)
    {

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name . ' Ha ingresado a ver los datos del usuario: ' . $user->name . ' a las: '
            . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.users.show', compact('user'));
    }




    public function edit(User $user)
    {

        $log = new LogSistema();
        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name . ' Ha ingresado a editar los datos del usuario: ' . $user->name . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();
        return view('admin.users.edit', compact('user'));
    }




    public function update(Request $request, User $user)
    {
        $user->update($request->except('role'));

        if ($request->has('role')) {
            $user->syncRoles($request->role);
        }

        $log = new LogSistema();
        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name . ' Ha modificó los datos del usuario: ' . $user->name . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return redirect()->route('admin.users.index')->with('success', 'El Usuario se editó con exito!');
    }




    public function destroy($id)
    {
        // $user = User::find($id);
        // $user->delete();
        // return back()->with('success', 'El usuario se eliminó correctamente');
    }



    public function autocomplete(Request $request)
    {
        return User::search($request->q)->take(10)->get();
    }
}
