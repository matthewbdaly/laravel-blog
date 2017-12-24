<?php

namespace LaravelBlog\Http\Controllers;

use Illuminate\Http\Request;
use LaravelBlog\Contracts\Repositories\Post;

class FrontPageController extends Controller
{
    public function __construct(Post $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->repository->orderBy('pub_date', 'desc')->limit(5)->get();
        return view('home', [
            'posts' => $posts
        ]);
    }

    public function page(int $page = 1)
    {
        $posts = $this->repository->orderBy('pub_date', 'desc')->limit(5)->offset(($page - 1) * 5)->get();
        return view('home', [
            'posts' => $posts,
            'page' => $page,
        ]);
    }

    public function bySlug($slug)
    {
        $post = $this->repositorty->where('slug', "/".$slug."/")->first();
        return view('post', [
            'post' => $post
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->input('q');
        $posts = $this->repository->search($search)->simplePaginate(5);
        return view('search', [
            'posts' => $posts,
            'search' => $search,
        ]);
    }
}
