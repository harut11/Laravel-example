<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\PostCategories;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::get();
        $posts = Posts::paginate(5);
        $categories = PostCategories::get();
        return view('posts.index', compact('posts', 'categories'));
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
            'categor_id' => 'required|in:' . PostCategories::get()->implode('id', ','),
        ]);
        $model = new Posts();

        $model->title = $request->get('post_title');
        $model->body = $request->get('post_body');
        $model->owner_id = \Auth::user()->id;
        $model->category_id = $request->get('category_id');
        $file = $request->file('post_thumbnail');
        $filename = str_random() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);
        $model->image = $filename;
        $model->save();

        return redirect()->route('posts.index'); 
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
        if ($file) {
            $filename = str_random() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $old_file_path = public_path('uploads') . '/' . $post->image;
            if (\File::exists($old_file_path)) {
                \File::delete($old_file_path);
            }
            $post->image = $filename;
        }
        
        $post->save();

        return redirect()->route('posts.index');
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
        return redirect()->route('posts.index');
    }

    public function changeLanguage($code)
    {
        session()->put('lang', $code);
        return redirect()->back();
    }
}
