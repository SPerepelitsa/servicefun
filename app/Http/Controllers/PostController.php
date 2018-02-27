<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Image;
use Session;


class PostController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $posts = Post::orderBy('id', 'desc')->paginate(10); // shows all posts (№items per page) with pagination

        return view('blog.index')->with('posts', $posts); // alterantive writing is ->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:255',
            'body'  => 'required',
            'image' => 'image',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $slug = $post->generateSlug($post->title);
        $post->slug = $slug;

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . "." . $image->getClientOriginalExtension();
            $location = public_path('img/posts/' . $filename); // foldername_path. We use public_path because we gonna save it into public folder.
            Image::make($image)->resize(800, 400)->save($location); // use http://image.intervention.io/

            $post->image = $filename;

        }

        $post->save();

        Session::flash('success', 'Создание записи завершилось успехом.');

        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug) {
        $post = Post::where('slug', '=', $slug)->first();

        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $post = Post::find($id);

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Post                $post
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|max:255',
            'body'  => 'required',
            'image' => 'image',
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $slug = $post->generateSlug($post->title);
        $post->slug = $slug;

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . "." . $image->getClientOriginalExtension();
            $location = public_path('img/posts/' . $filename); // foldername_path. We use public_path because we gonna save it into public folder.
            Image::make($image)->resize(800, 400)->save($location); // use http://image.intervention.io/

            $post->image = $filename;

        }

        $post->save();

        Session::flash('succsess', 'Запись отредактирована успешно.');

        return redirect()->route('posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     * @internal param Post $post
     *
     */
    public function destroy($id) {

        $post = Post::find($id);
        if($post->image != null) {
            $img_location = public_path('img/posts/' . $post->image);
            if(file_exists($img_location)) {
                unlink($img_location);
            }
        }

        $post->delete();

        Session::flash('success', 'Запись была успешно удалена!');

        return redirect()->route('blog.index');
    }
}
