<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $posts = Post::all();
       return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories      = Category::pluck('name', 'id') -> all();
        $tags            = Tag::all();

        if(!$categories || $tags -> count() == 0){
            Session::flash('info', 'You must create a category and tag before attempting to create a post!');
            return redirect() -> route('posts');
        }
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $input = $request->all();

        $featured = $request->file('featured');

        $input['slug'] = str_slug($input['title']);
        $input['user_id'] = Auth::user()->id;


        if($featured) {
            $name = time() . $featured -> getClientOriginalName();
            $featured -> move('uploads/posts/', $name);

            $input['featured'] = 'uploads/posts/' . $name;
        }

        $result = Post::create($input);

        $result -> tags() -> attach($request->tags);

        if($result) {
            Session::flash('status', 'Post Created Successfully!');
        } else {
            Session::flash('error', 'Something went wrong.');
        }

        return redirect() -> route('posts');

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
        $post            = Post::findOrFail($id);
        $categories      = Category::pluck('name', 'id')->all();
        $tags            = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $input = $request -> all();
        if($request -> hasFile('featured') ){

         $featured = $input['featured'];

         $featured_new_name = time() . $featured -> getClientOriginalName();

         $featured -> move('uploads/posts/', $featured_new_name);

         $input['featured'] = 'uploads/posts/' . $featured_new_name;

         }
         $result = $post -> update($input);
         $post -> tags() -> sync($request -> tags);

         if($result) {
            Session::flash('status', 'Post Updated Successfully!');
         } else {
            Session::flash('error', 'Something went wrong.');
         }

         return redirect() -> route('posts') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $result = $post->delete();

         if($result) {
            Session::flash('status', 'Post Deleted Successfully!');
         } else {
            Session::flash('error', 'Something went wrong.');
         }

         return redirect() -> route('posts') ;
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()-> get();

        return view('admin.posts.trashed', compact('posts'));

         if($result) {
            Session::flash('status', 'Post restored Successfully!');
         } else {
            Session::flash('error', 'Something went wrong.');
         }

         return redirect() -> route('posts') ;

    }

    public function kill($id)
    {
        $post = Post::withTrashed() -> where('id', $id) -> first();

        $result = $post->forceDelete();

         if($result) {
            Session::flash('status', 'Post Deleted permanently!');
         } else {
            Session::flash('error', 'Something went wrong.');
         }

         return redirect() -> route('posts') ;
    }

    public function restore($id)
    {
        $post = Post::withTrashed() -> where('id', $id) -> first();

        $result = $post->restore();

         if($result) {
            Session::flash('status', 'Post Successfully restored!');
         } else {
            Session::flash('error', 'Something went wrong.');
         }

         return redirect() -> route('posts') ;

    }
}
