<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dog;
use Illuminate\Support\Facades\Auth;

class DogController extends Controller
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
        return view('dog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dog.create');
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

        $dog = new Dog();
        $dog->item_name = $request->input('title');
        $dog->category = $request->input('category');
        $dog->description = $request->input('description');
        $dog->dimensions = $request->input('dimension');
        $dog->quantity = $request->input('quantity');
        $dog->price = $request->input('price');
        $dog->photo = $request->file('photo')->store('public/dogs');

        $dog->save();

        return redirect('sunys')->with('success', 'Prekė pridėta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dog = Dog::find($id);

        return view('dog.show')->with('dog', $dog);
    }


    public function category(Request $request)
    {
        $dogs = Dog::where('category', $request->input('category'))->get();

        return view('dog.category')->with('dogs', $dogs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dog = Dog::find($id);

        return view('dog.edit')->with('dog', $dog);
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
            'title' => 'required',
            'description' => 'required',
            'dimension' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        $dog = Dog::find($id);
        $dog->item_name = $request->input('title');
        $dog->description = $request->input('description');
        $dog->dimensions = $request->input('dimension');
        $dog->quantity = $request->input('quantity');
        $dog->price = $request->input('price');

        $dog->update();

        return redirect('sunys')->with('success', 'Prekė pakeista');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dog = Dog::find($id);

        $dog->delete();

        return redirect('sunys')->with('danger', 'suo buvo panaikintas');
    }








}
