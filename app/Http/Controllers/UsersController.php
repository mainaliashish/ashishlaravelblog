<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function __construct()
    {
        $this -> middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email'
        ]);

        $user = User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => bcrypt('password'),
        ]);

        $profile = Profile::create([
            'user_id'  => $user->id,
            'avatar'   => 'uploads/avatars/preset.png'
        ]);
        if($user && $profile) {
            Session::flash('status', 'User Created Successfully!');
         } else {
            Session::flash('error', 'Something went wrong.');
         }

         return redirect() -> route('users') ;
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
        $user = User::findOrfail($id);

        $profile = $user -> profile -> delete();
        $user = $user -> delete();

        if($profile && $user) {
            Session::flash('status', 'User and Profile Deleted Successfully!');
         } else {
            Session::flash('error', 'Something went wrong.');
         }

         return redirect() -> route('users') ;

    }

    public function admin($id)
    {
        $user = User::findOrfail($id);

        $user -> admin = 1;
        $result = $user -> save();

        if($result) {
            Session::flash('status', 'User updated to Admin Successfully!');
         } else {
            Session::flash('error', 'Something went wrong.');
         }

         return redirect() -> route('users') ;
    }

    public function not_admin($id)
    {
        $user = User::findOrfail($id);

        $user -> admin = 0;
        $result = $user -> save();

        if($result) {
            Session::flash('status', 'User permission updated Successfully!');
         } else {
            Session::flash('error', 'Something went wrong.');
         }

         return redirect() -> route('users') ;
    }
}
