<?php

namespace Blog\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Blog\Http\Requests;
use Blog\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
    	return view('admin.index');
    }
}
