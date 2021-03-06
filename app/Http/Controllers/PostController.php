<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use Image;
use Session;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('blog.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = md5(microtime(true)) . "." . $image->getClientOriginalExtension();
            $location = public_path('img/posts/' . $filename);
            Image::make($image)->resize(800, 400)->save($location); // use http://image.intervention.io/

            $post->image = $filename;

        }
        $post->user_id = Auth::id();

        $post->save();

        Session::flash('success', 'Запись успешно создана.');

        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();
        $parentComments = $post->comments->where('parent_id', null);
        $commentsAmount = count($post->comments);

        return view('posts.show')->with('post', $post)->with('comments', $parentComments)->with('amount',
            $commentsAmount);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

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
    public function update(Request $request, $id)
    {
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

        //adds a new picture to the storage
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = md5(microtime(true)) . "." . $image->getClientOriginalExtension(); // sets the file name.
            $location = public_path('img/posts/' . $filename); // foldername_path. We use public_path because we gonna save it into public folder.
            Image::make($image)->resize(800,
                400)->save($location); // use http://image.intervention.io/ ---- saves image to a public storage

            //delets old picture from the storage if it exists.
            if ($post->image != null) {
                $imgLocation = public_path('img/posts/' . $post->image);
                if (file_exists($imgLocation)) {
                    unlink($imgLocation);
                }
            }
            //saves a new file name to database.
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
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post->image != null) {
            $imgLocation = public_path('img/posts/' . $post->image);
            if (file_exists($imgLocation)) {
                unlink($imgLocation);
            }
        }
        $post->delete();

        Session::flash('success', 'Запись была успешно удалена!');

        return redirect()->route('blog.index');
    }
}
