<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
    public function store(Post $post) {
        
        $this->validate(request(), ['body' => 'required|min:2']);
        $post->addComment(request('body'));
        
        // this works but isn't necessarily 'adding a comment to a post'
        // Comment::create([
        //     'body' => request('body'),
        //     'post_id' => $post->id
        // ]);
        return back();
    }
}
