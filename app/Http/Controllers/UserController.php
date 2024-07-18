<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
// use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
    }

    public function get_data()
    {
        $users = User::select(['id', 'name', 'email', 'created_at']);
        return DataTables::of($users)
            ->addColumn('action', function ($user) {
                return $this->get_buttons($user->id);
            })
            ->addColumn('registered_at', function ($user) {
                return $user->created_at->format('d M,Y');
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.modal.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => ['required', Rule::unique('users')],
                'password' => 'required|min:8',
                'role' => 'required',
            ],
        );
        if ($validate->fails()) {
            return response()->json($validate->errors()->first(), 500);
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $role = $request->role;
        $role = Role::findByName($role);
        $user->assignRole($role);
        return 'Success';
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
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.modal.edit', compact('user'));
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
        $user = User::with('roles')->find($request->id);
        $user->name = $request->name;
        $user->password = $request->password != null ?  Hash::make($request->password) : $user->password;
        $user->save();

        $role = $request->role;
        $role = Role::findByName($role);
        $user->removeRole($user->roles[0]);
        $user->assignRole($role);
        return 'User Updated Successfully';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agent = User::find($id);
        $agent->delete();
        return 'User Deleted Succesfully';
    }
}
