<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function index()
    {
    	$posts = \App\Posts::all();
    	return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
    	$post = \App\Posts::find($id);
    	return view('posts.show', compact('post'));
    }
}
