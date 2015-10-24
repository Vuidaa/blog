<?php

namespace Blog\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Blog\Http\Requests;
use Blog\Http\Controllers\Controller;
use Blog\Http\Requests\CategoryRequest;
use Blog\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
    	$categories = Category::with('posts')->get();

        return view('admin.category.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$categories = Category::all();

        return view('admin.category.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $req)
    {
        $category = new Category;
        $category->category = $req->input('category');
        $category->save();

        return redirect('admin/category')->with('message',['class'=>'success','message'=>'Category added.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $category = Category::where('slug', '=', $slug)->firstorFail();
        $category->load('posts.tags','posts.comments');

        return view('admin.category.show')->with('category',$category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $category = Category::where('slug','=',$slug)->firstorFail();

        return view('admin.category.edit')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $req, $slug)
    {
        $category = Category::where('slug','=',$slug)->firstorFail();
        $category->category = $req->input('category');
        $category->save();

        return redirect('admin/category')->with('message',['class'=>'success','message'=>'Category updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $category = Category::where('slug','=',$slug)->firstorFail();
        $category->delete();

        return redirect('admin/category')->with('message',['class'=>'success','message'=>'Category deleted.']);
    }
}
