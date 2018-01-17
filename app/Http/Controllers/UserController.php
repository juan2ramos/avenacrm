<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\Permission;
use App\Models\Point;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', ['users' => User::with(['roles','assign'])->paginate()]);
    }

    public function create()
    {
        return view('admin.users.create', ['roles' => Role::pluck('name', 'id')]);
    }

    public function store(UsersRequest $request)
    {
        $request->merge(['password' => bcrypt($request->get('password'))]);
        $user = User::create($request->all());
        $user->assignRole($request->input('role'));

        return redirect()->route('usuarios.index');
    }

    public function edit(User $usuario)
    {
        Session()->flash('userId', $usuario->id);

        return view('admin.users.edit', ['user' => $usuario, 'roles' => Role::pluck('name', 'id')]);
    }

    public function update(UsersRequest $request, User $usuario)
    {
        $usuario->fill($request->except('password'));
        if ($request->get('password')) {
            $usuario->password = bcrypt($request->get('password'));
        }
        $usuario->syncRoles($request->input('role'));
        $usuario->save();

        return redirect()->back()->with('success', true);
    }

    /**
     * @param \App\User $usuario
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $usuario)
    {
        if (Auth::user()->id == session('userId')) {
            return redirect()->back()->with('userMe', true);
        }
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('deleteUser', true);
    }

    public function assign(User $user)
    {
        Session()->flash('userId', $user->id);

        return view('admin.users.assign', ['user' => $user->load('assign'), 'points' => Point::pluck('name', 'id')]);
    }

    public function assignCreate(Request $request)
    {

        $point = Point::findOrFail($request->input('point'));
        $point->user_id = session('userId');
        $point->save();

        return redirect()->route('usuarios.index')->with('assign', true);
    }
}
