<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\Permission;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function index()
    {
        return view('admin.users.index', ['users' => User::latest()->paginate()]);
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

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'id');
        $permissions = Permission::all('name', 'id');

        return view('user.edit', compact('user', 'roles', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'bail|required|min:2',
            'email' => 'required|email|unique:users,email,' . $id,
            'roles' => 'required|min:1'
        ]);

        // Get the user
        $user = User::findOrFail($id);

        // Update user
        $user->fill($request->except('roles', 'permissions', 'password'));

        // check for password change
        if ($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        // Handle the user roles
        $this->syncPermissions($request, $user);

        $user->save();
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        if (Auth::user()->id == $id) {
            return redirect()->back();
        }
        User::findOrFail($id)->delete();
        return redirect()->back();
    }

    private function syncPermissions(Request $request, $user)
    {
        // Get the submitted roles
        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);

        // Get the roles
        $roles = Role::find($roles);

        // check for current role changes
        if (!$user->hasAllRoles($roles)) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);
        return $user;
    }
}
