<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\User;
use App\Profile;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.users.index')->with('users', User::all());
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required|email'
        ]);

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt('pavel007')
        ]);

        $profile = Profile::create([
            'user_id'   => $user->id,
            'avatar'    => 'uploads/avatar/default.jpg'
        ]);

        Session::flash('success', 'User Created Successfully.');

        return redirect()->route('users');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->profile->delete();
        $user->delete();

        Session::flash('success', "User han been Deleted.");
        return redirect()->back();
    }

    public function admin($id)
    {
        $user = User::find($id);
        $user->admin = 1;
        $user->save();

        Session::flash('success', 'Successfully changed user permission.');

        return redirect()->route('users');
    }

    public function Notadmin($id)
    {
        $user = User::find($id);
        $user->admin = 0;
        $user->save();

        Session::flash('success', 'Successfully changed user permission.');

        return redirect()->route('users');
    }
}
