<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Dog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('create', 'store', 'update', 'edit');
        $this->middleware('admin')->only('destroy', 'confirm', 'setConfirms');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->where('confirmation', 1)->take(3)->get();

        return view('blog.index')->with('blogs', $blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
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
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photo' => 'required',
        ]);

        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->category = $request->input('category');
        $blog->description = $request->input('description');
        $blog->location = $request->input('location');
        $blog->price = $request->input('price');
        $blog->photo = $request->file('photo')->store('public/blogs');

        $blog->save();

        return redirect('skelbimai')->with('success', 'Skelbimas laukia patvirtinimo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);

        return view('blog.show')->with('blog', $blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);

        $blog->delete();

        return redirect('skelbimai')->with('error', 'skelbimas panaikintas');
    }


    public function setConfirms()
    {
        $blogs = Blog::where('confirmation', 0)->get();

        return view('blog.confirm')->with('blogs', $blogs);
    }

    public function confirm($id)
    {
        $blog = Blog::find($id);

        $blog->confirmation = 1;

        $blog->update();

        return redirect()->back()->with('success', 'skelbimas patvirtintas');
    }

}




