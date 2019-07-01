<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
       return view('admin.users.profile') -> with('user', Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(UpdateProfileRequest $request)
    {
        $user = Auth::user();

        if($request -> hasFile('avatar'))
        {
            $avatar = $request -> avatar;

            $avatar_new_name = time() . $avatar -> getClientOriginalName();

            $avatar -> move('uplods/avatars/', $avatar_new_name);

            $user -> profile -> avatar = 'uplods/avatars/' . $avatar_new_name;

            $user -> profile -> save();

        }

        $user -> name                   = $request -> name;
        $user -> email                  = $request -> email;
        $user -> profile -> about       = strip_tags($request -> about);
        $user -> profile -> facebook    = $request -> facebook;
        $user -> profile -> youtube     = $request -> youtube;

        $user -> save();

        $profile = $user->profile->save();

        if($request -> has('password'))
        {
            $user -> password = bcrypt($request -> password);
        }

        Session::flash('status', 'User Account Successfully Updated!');

        return redirect() -> route('users.profile');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
