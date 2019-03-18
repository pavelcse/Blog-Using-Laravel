<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{

    public function index()
    {
        return view('admin.users.profile')->with('user', Auth::user());
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email',
            'facebook'  => 'required|url',
            'youtube'   => 'required|url'
        ]);

        $user = Auth::user();

        if($request->hasFile('avatar'))
        {
            $avatar = $request->avatar;
            $avatar_new_name = time().$avatar->getClientOriginalName();
            $avatar->move('uploads/avatar', $avatar_new_name);

            $user->profile->avatar = 'uploads/avatar/'.$avatar_new_name;
            $user->profile->save();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->facebook = $request->facebook;
        $user->profile->youtube = $request->youtube;
        $user->profile->about = $request->about;

        if($request->has('password'))
        {
            $user->password = bcrypt($request->password);
        }

        $user->save();
        $user->profile->save();

        Session::flash('success', 'Profile Updated Successfully.');
        return redirect()->back();
    }


    public function destroy($id)
    {
        //
    }
}
