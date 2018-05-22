<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{

    public function getIndex()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(3); // shows all posts (№items per page) with pagination

        return view('blog.index')->with('posts', $posts); // alterantive writing is ->withPosts($posts);
    }

}
