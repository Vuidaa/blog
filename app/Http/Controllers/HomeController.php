<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;
use Blog\Http\Requests;
use Blog\Http\Controllers\Controller;

use Blog\Tag;
use Blog\Post;
use Blog\Comment;
use Blog\Category;
use Blog\Http\Requests\CommentRequest;

class HomeController extends Controller
{
    public function index()
    {
    	$posts = Post::with('category','comments','tags','user')->orderBy('created_at','desc')->paginate(10);

    	$latestPosts = $posts->take(5)->all();

    	$categories = Category::all();

    	$tags = Tag::all();

    	return view('pages.home')->with([
    			'posts'=>$posts,
    			'latestPosts'=>$latestPosts,
    			'categories'=>$categories,
    			'tags'=>$tags]);
   	}

   	public function filter($rule, $slug)
   	{
   		dd($rule,$slug);
   	}

	public function contact()
	{
		return view('pages.contact');
	}
	public function about()
	{
		return view('pages.about');
	}


	public function post($slug)
	{
		$post = Post::where('slug','=',$slug)->firstOrFail();

		$post->load('category','tags','user','comments');

		
		$totalComments = $post->comments->count();

		return view('pages.post')->with(['post'=>$post, 'totalComments'=>$totalComments]);
	}


	public function createComment(CommentRequest $req)
	{

		$comment = new Comment;
		$comment->name = $req->input('name');
		$comment->email = $req->input('email');
		$comment->body = $req->input('comment');
		$comment->reply_id = $req->input('reply');

		$post = Post::findorFail($req->input('post_id'));

		$post->comments()->save($comment);

		return redirect()->back();
	}
}
