<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index() {
        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();

        $archives = Post::archives();

        return view('posts.index', compact('posts'));
    }
    
    public function show(Post $post) {
        return view('posts.show', compact('post'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store() {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);
        // Create a new post, save, and then redirect
        // Post::create(request(['title', 'body']));
        // or
        // Post::create([
        //     'title' => request('title'),
        //     'body' => request('body'),
        //     'user_id' => auth()->id()
        // ]);
        // or
        
        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );
        return redirect('/');
    }
}
