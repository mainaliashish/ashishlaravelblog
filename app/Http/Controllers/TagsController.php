<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'tag' => 'required'
        ]);

        $result = Tag::create([
            'tag' => $request -> tag,
            'slug' => str_slug($request -> tag)
        ]);

        if($result) {
            Session::flash('status', 'Tag Created Successfully!');
        } else {
            Session::flash('error', 'Something went wrong.');
        }

        return redirect() -> route('tags');
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
        $tag = Tag::where('slug', $slug)->first();

       return view('admin.tags.edit', compact('tag'));
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
        $this -> validate($request, [
            'tag'   => 'required'
        ]);

        $tag = Tag::where('slug', $slug)->first();


        $tag -> tag = $request -> tag;

        $result = $tag -> save();
        if($result) {
            Session::flash('status', 'Tag Updated Successfully!');
        } else {
            Session::flash('error', 'Something went wrong.');
        }

        return redirect() -> route('tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $result = $tag -> delete();

         if($result) {
            Session::flash('status', 'Tag Deleted Successfully!');
         } else {
            Session::flash('error', 'Something went wrong.');
         }

         return redirect() -> route('tags') ;
    }
}
