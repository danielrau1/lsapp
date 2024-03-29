<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB; //In order to use sql querries

class PostsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]); //DR: like this guests can't edit posts
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts= Post::all(); //get all posts
        //return $post = Post::where('title','Post Two')->get(); // Returns where
       // $posts= Post::orderBy('title','desc')->get(); //get all posts ordered by
       // $posts= Post::orderBy('title','desc')->take(1)->get(); //get all posts ordered by and having limit
        $posts= Post::orderBy('created_at','desc')->paginate(2); //with pagination

        //$posts = DB::select('SELECT * FROM posts');
        return view('posts/index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required'
        ]);
        // Create post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post= Post::find($id); //This by itself will show the JSON of the post
        return view('posts/show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= Post::find($id);
        //check for correct user
        if(auth()->user()->id!==$post->user_id){
            return view('posts');
        }
        return view('posts/edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required'
        ]);
        // Create post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if(auth()->user()->id!==$post->user_id){
            return view('posts');
        }

        $post->delete();
        return redirect('/posts');
    }
}
