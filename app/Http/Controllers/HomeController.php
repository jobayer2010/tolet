<?php

namespace App\Http\Controllers;

use App\Tolet;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['reguser', 'admin']);
        $tolets = Tolet::where('user_id', auth()->user()->id)->get();
        return view('home')->with('tolets', $tolets);
    }


    public function getalluser()
    {
        return  User::with('roles')->get();
    }
}
