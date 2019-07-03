<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;
use App\Tag;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function blog()
    {
    	return view('blog')
    				->with('categories', Category::take(5)->orderBy('created_at', 'desc')->get())
    				->with('first_post', Post::orderBy('created_at', 'desc')->first())
    				->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
    				->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
    				->with('rails', Category::find('6'))
    				->with('web', Category::find('5'))
    				->with('settings', Setting::first())
    				;
    }

    public function singlepost($slug)
    {
    	$post = Post::where('slug', $slug)->first();

        $next_id = Post::where('id', '>', $post -> id)->min('id');
        $previous_id = Post::where('id', '<', $post -> id)->max('id');

    	return view('single')
    				->with('post', $post)
    				->with('title', $post->title)
    				->with('categories', Category::take('5')->get())
        		    ->with('settings', Setting::first())
                    ->with('tags', Tag::all())
                    ->with('next', Post::find($next_id))
                    ->with('previous', Post::find($previous_id));


    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();

        $tags = Tag::all();

        return view('category')
                    ->with('category', $category)
                    ->with('tags', $tags)
                    ->with('title', $category->name)
                    ->with('settings', Setting::first())
                    ->with('categories', Category::take('5')->get());
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->first();

        $tags = Tag::all();

        return view('tag')
                    ->with('tag', $tag)
                    ->with('tags', $tags)
                    ->with('title', $tag->tag)
                    ->with('settings', Setting::first())
                    ->with('categories', Category::take('5')->get());
    }
}
