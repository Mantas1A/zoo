<?php

namespace App\Http\Controllers;

use App\Bird;
use App\Cart;
use App\Cat;
use App\Dog;
use App\Fish;
use App\Http\Controllers\Controller;
use App\Reptile;
use App\Rodent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();

        $items = array();

        $cart = Cart::where('user_id', $id)->get();


        foreach ($cart as $item){
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
            $itemdetails->quantity = $item->quantity;
            $itemdetails->cart_id = $item->id;
            array_push($items, $itemdetails);
        }

        return view('cart.index')->with('items', $items);
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
        $cart = new Cart();

        $cart->user_id = $request->user()->id;
        $cart->item_id = $request->input('item');
        $cart->item_category = $request->input('category');
        $cart->quantity = $request->input('quantity');


        $cart->save();

        return redirect()->back()->with('success', 'Prekė pridėta į krepšėlį');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);

        $cart->delete();

        return redirect('krepselis')->with('success', 'Preke isimta');
    }
}
