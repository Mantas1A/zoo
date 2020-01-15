<?php

namespace App\Http\Controllers;

use App\Fish;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FishController extends Controller
{


    public function __construct()
    {
        $this->middleware('admin')->except('index', 'show', 'category');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fish.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fish.create');
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
            'dimension' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'photo' => 'required',
        ]);

        $fish = new Fish();
        $fish->item_name = $request->input('title');
        $fish->category = $request->input('category');
        $fish->description = $request->input('description');
        $fish->dimensions = $request->input('dimension');
        $fish->quantity = $request->input('quantity');
        $fish->price = $request->input('price');
        $fish->photo = $request->file('photo')->store('public/fish');

        $fish->save();

        return redirect('zuvys')->with('success', 'Prekė pridėta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fish = Fish::find($id);

        return view('fish.show')->with('fish', $fish);
    }


    public function category(Request $request)
    {
        $fishes = Fish::where('category', $request->input('category'))->get();

        return view('fish.category')->with('fishes', $fishes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fish = Fish::find($id);

        return view('fish.edit')->with('fish', $fish);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fish  $fish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fish $fish)
    {
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'dimension' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        $fish = new Fish();
        $fish->item_name = $request->input('title');
        $fish->description = $request->input('description');
        $fish->dimensions = $request->input('dimension');
        $fish->quantity = $request->input('quantity');
        $fish->price = $request->input('price');

        $fish->update();

        return redirect('zuvys')->with('success', 'Prekė pakeista');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fish = Fish::find($id);
        $fish->delete();

        return redirect('zuvys')->with('danger', 'zuvis buvo panaikinta');
    }
}
