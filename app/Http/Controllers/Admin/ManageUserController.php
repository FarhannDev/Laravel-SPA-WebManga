<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'ASC')->get();
        $roles = Role::all();
        return view('pages.admin.user.index', compact(['users', 'roles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'  => 'required|email',
            'name'   => 'required',
            'role_id'   => 'required',
            'password'  => 'required|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:6',
        ]);

        User::create([
            'name'           => $request->name,
            'email'          => $request->email,
            'role_id'        => $request->role_id,
            'password'       => Hash::make($request->password),
            'created_at'     => new \DateTime(),
            'updated_at'     => new \DateTime(),
        ]);

        return redirect()->route('manageUserIndex')
            ->with('message_success', 'Berhasil menambahkan pengguna baru');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();

        return redirect()->route('manageUserIndex')
            ->with('message_success', 'Berhasil menghapus pengguna' . ' ' . $users->name);
    }

    public function author()
    {
        $users = User::where('role_id', 2)->orderBy('created_at', 'ASC')->get();
        return view('pages.admin.user.author', compact(['users']));
    }
}
