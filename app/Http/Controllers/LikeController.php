<?php

namespace App\Http\Controllers;

use App\Bird;
use App\Cart;
use App\Cat;
use App\Dog;
use App\Fish;
use App\Like;
use App\Http\Controllers\Controller;
use App\Reptile;
use App\Rodent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();

        $items = array();

        $like = Like::where('user_id', $id)->get();

        foreach ($like as $item){
            if($item->item_category == 1){
                $itemdetails = Dog::where('id', $item->item_id)->get();
            }elseif ($item->item_category == 2){
                $itemdetails = Cat::where('id', $item->item_id)->get();
            }elseif ($item->item_category == 3){
                $itemdetails = Rodent::where('id', $item->item_id)->get();
            }elseif ($item->item_category == 4){
                $itemdetails = Fish::where('id', $item->item_id)->get();
            }elseif ($item->item_category == 5){
                $itemdetails = Reptile::where('id', $item->item_id)->get();
            }elseif ($item->item_category == 6){
                $itemdetails = Bird::where('id', $item->item_id)->get();
            }
            $itemdetails->like_id = $item->id;
            array_push($items, $itemdetails);
        }

        return view('like.index')->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $like = new Like();

        $like->user_id = $request->user()->id;
        $like->item_id = $request->input('item');
        $like->item_category = $request->input('category');

        $like->save();

        return redirect()->back()->with('success', 'Prekė įsiminta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $like = Like::find($id);

        $like->delete();

        return redirect('patike')->with('success', 'Preke pamiršta');
    }
}
