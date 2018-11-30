<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = \App\Posts::get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Posts();
        return view('posts.create', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'post_title' => 'required|string|max:200|min:3',
            'post_body' => 'required|string|max:200|min:3',
            'post_thumbnail' => 'image|max:2048',
        ]);
        $model = new Posts();

        $model->title = $request->get('post_title');
        $model->body = $request->get('post_body');
        $file = $request->file('post_thumbnail');
        $filename = str_random() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);
        $model->image = $filename;
        $model->save();

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
        $post = \App\Posts::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = \App\Posts::findOrFail($id);
        return view('posts.edit', compact('post'));
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
        $this->validate($request, [
            'post_title' => 'required|string|max:200|min:3',
            'post_body' => 'required|string|max:200|min:3',
            'post_thumbnail' => 'image|max:2048',
        ]);

        $post = \App\Posts::findOrFail($id);

        $post->title = $request->get('post_title');
        $post->body = $request->get('post_body');
        $file = $request->file('post_thumbnail');
        $filename = str_random() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);
        $post->image = $filename;
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
        $post = \App\Posts::findOrFail($id);
        $post->delete();
        return redirect('/posts');
    }
}
