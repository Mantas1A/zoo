<?php

namespace App\Http\Controllers;

use App\Rodent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RodentController extends Controller
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
        return view('rodent.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rodent.create');
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

        $rodent = new Rodent();
        $rodent->item_name = $request->input('title');
        $rodent->category = $request->input('category');
        $rodent->description = $request->input('description');
        $rodent->dimensions = $request->input('dimension');
        $rodent->quantity = $request->input('quantity');
        $rodent->price = $request->input('price');
        $rodent->photo = $request->file('photo')->store('public/rodent');

        $rodent->save();

        return redirect('/peles')->with('success', 'Prekė pridėta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rodent = Rodent::find($id);

        return view('rodent.show')->with('rodent', $rodent);
    }

    public function category(Request $request)
    {
        $rodents = Rodent::where('category', $request->input('category'))->get();

        return view('rodent.category')->with('rodents', $rodents);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rodent = Rodent::find($id);

        return view('rodent.edit')->with('rodent', $rodent);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rodent $rodent)
    {
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'dimension' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        $rodent = new Rodent();
        $rodent->item_name = $request->input('title');
        $rodent->description = $request->input('description');
        $rodent->dimensions = $request->input('dimension');
        $rodent->quantity = $request->input('quantity');
        $rodent->price = $request->input('price');

        $rodent->update();

        return redirect('/peles')->with('success', 'Prekė pakeista');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rodent  $rodent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rodent = Rodent::find($id);
        $rodent->delete();

        return redirect('peles')->with('danger', 'peliukas buvo panaikintas');
    }
}
