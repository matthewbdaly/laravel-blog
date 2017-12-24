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
        $posts = $this->repository->orderByLimit('pub_date', 'desc', 5);
        return view('home', [
            'posts' => $posts
        ]);
    }

    public function page(int $page = 1)
    {
        $posts = $this->repository->orderByLimit('pub_date', 'desc', 5, ($page - 1) * 5);
        return view('home', [
            'posts' => $posts,
            'page' => $page,
        ]);
    }

    public function bySlug($slug)
    {
        $post = $this->repository->bySlug("/".$slug."/");
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
