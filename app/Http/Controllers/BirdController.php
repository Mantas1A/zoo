<?php

namespace App\Http\Controllers;

use App\Bird;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BirdController extends Controller
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
        return view('bird.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bird.create');
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

        $bird = new Bird();
        $bird->item_name = $request->input('title');
        $bird->category = $request->input('category');
        $bird->description = $request->input('description');
        $bird->dimensions = $request->input('dimension');
        $bird->quantity = $request->input('quantity');
        $bird->price = $request->input('price');
        $bird->photo = $request->file('photo')->store('public/birds');

        $bird->save();

        return redirect('/pauksciai')->with('success', 'Prekė pridėta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bird = bird::find($id);

        return view('bird.show')->with('bird', $bird);
    }

    public function category(Request $request)
    {
        $birds = Bird::where('category', $request->input('category'))->get();

        return view('bird.category')->with('birds', $birds);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bird = bird::find($id);

        return view('bird.edit')->with('bird', $bird);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bird $bird)
    {
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'dimension' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        $bird = new Bird();
        $bird->item_name = $request->input('title');
        $bird->description = $request->input('description');
        $bird->dimensions = $request->input('dimension');
        $bird->quantity = $request->input('quantity');
        $bird->price = $request->input('price');
        $bird->photo = $request->file('photo')->store('public/birds');

        $bird->update();

        return redirect('/pauksciai')->with('success', 'Prekė pakeista');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bird = Bird::find($id);
        $bird->delete();

        return redirect('pauksciai')->with('danger', 'paukstis buvo panaikintas');
    }
}
