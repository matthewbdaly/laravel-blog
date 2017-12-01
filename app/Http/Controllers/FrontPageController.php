<?php

namespace LaravelBlog\Http\Controllers;

use Illuminate\Http\Request;
use LaravelBlog\Post;

class FrontPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('pub_date', 'desc')->limit(5)->get();
        return view('home', [
            'posts' => $posts
        ]);
    }

    public function bySlug($slug)
    {
        $post = Post::where('slug', "/".$slug."/")->first();
        return view('post', [
            'post' => $post
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->input('q');
        $posts = Post::search($search)->get();
        return view('home', [
            'posts' => $posts
        ]);
    }
}
