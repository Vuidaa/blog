<?php

namespace Blog\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Blog\Http\Requests;
use Blog\Http\Controllers\Controller;

use Blog\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::with('posts')->get();

        return view('admin.tag.index')->with('tags',$tags);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
       $tag = Tag::where('slug','=',$slug)->firstorFail();
       $tag->load('posts.comments','posts.tags');

       return view('admin.tag.show')->with('tag',$tag);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $tag = Tag::where('slug','=',$slug)->firstorFail();

        $tag->delete();

        return redirect('admin/tag')->with('message',['class'=>'success','message'=>'Tag deleted.']);
    }
}
