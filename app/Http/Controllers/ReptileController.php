<?php

namespace App\Http\Controllers;

use App\Reptile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReptileController extends Controller
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
        return view('reptile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reptile.create');
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

        $reptile = new Reptile();
        $reptile->item_name = $request->input('title');
        $reptile->category = $request->input('category');
        $reptile->description = $request->input('description');
        $reptile->dimensions = $request->input('dimension');
        $reptile->quantity = $request->input('quantity');
        $reptile->price = $request->input('price');
        $reptile->photo = $request->file('photo')->store('public/reptile');


        $reptile->save();

        return redirect('/ropliai')->with('success', 'Prekė pridėta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reptile = Reptile::find($id);

        return view('reptile.show')->with('reptile', $reptile);
    }

    public function category(Request $request)
    {
        $reptiles = Reptile::where('category', $request->input('category'))->get();

        return view('reptile.category')->with('reptiles', $reptiles);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reptile = Reptile::find($id);

        return view('reptile.edit')->with('reptile', $reptile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reptile $reptile)
    {
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'dimension' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        $reptile = new Reptile();
        $reptile->item_name = $request->input('title');
        $reptile->description = $request->input('description');
        $reptile->dimensions = $request->input('dimension');
        $reptile->quantity = $request->input('quantity');
        $reptile->price = $request->input('price');

        $reptile->update();

        return redirect('/ropliai')->with('success', 'Prekė pakeista');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reptile = Reptile::find($id);
        $reptile->delete();

        return redirect('ropliai')->with('danger', 'roplys buvo panaikintas');
    }
}
