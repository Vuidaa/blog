<?php

namespace Blog\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Blog\Http\Requests;
use Blog\Http\Controllers\Controller;

use Blog\Http\Requests\PostRequest;
use Blog\Category;
use Blog\Post;
use Blog\Jobs\CreatePost;
use Blog\Jobs\EditPost;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category','tags','comments')->get();

        return view('admin.post.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('category','id');

        return view('admin.post.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $req)
    {
        $createPost = new CreatePost($req);

        if($createPost->handle())
        {
            return redirect('admin/post')->with('message',['class'=>'success','message'=>'Post created.']);
        }

        return redirect('admin/post')->with('message',['class'=>'danger','message'=>'Please try again later.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', '=', $slug)->firstorFail();

        return view('admin.post.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug','=',$slug)->firstorFail();

        $categories = Category::lists('category','id');

        return view('admin.post.edit')->with(['post'=>$post,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $req, $slug)
    {
        $post = Post::where('slug','=',$slug)->firstorFail();

        $createPost = new EditPost($req, $post);

        if($createPost->handle())
        {
            return redirect('admin/post')->with('message',['class'=>'success','message'=>'Post updated.']);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug','=',$slug)->firstorFail();

        $post->delete();

       return redirect('admin/post')->with('message',['class'=>'success','message'=>'Post deleted.']);
    }
}
