<?php

namespace App\Http\Controllers;

use App\Blog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogs = Blog::latest()->where('confirmation', 1)->take(5)->get();

        return view('home')->with('blogs', $blogs);
    }

    public function edit()
    {
        $user = Auth::user();

        return view('auth.options')->with('user', $user);
    }


    public function updateuser(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->location = $request->location;

        $user->update();

        return redirect('/')->with('success', 'Nustatymai pakeisti');
    }


}
