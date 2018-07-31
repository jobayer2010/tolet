<?php

namespace App\Http\Controllers;

use App\User;
use App\Tolet;

use Illuminate\Http\Request;

class BookmarkController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['reguser']);

        // $tolets = DB::table('tolet_user')->where('tolet_user.user_id', '=', auth()->user()->id)
        // ->join('tolets', 'tolet_user.tolet_id', '=', 'tolets.id')->get();

        //$tolets = User::find(auth()->user()->id)->postedTolets()->get();
        
        $tolets = User::find(auth()->user()->id)->bookmarkedTolets()->where('is_removed', 0)->get();
        return view('bookmark.index')->with('tolets', $tolets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($tid, Request $request)
    {
        $request->user()->authorizeRoles(['reguser', 'admin']);

        $tolet = Tolet::find($tid);
        $user = User::find(auth()->user()->id);
        $user->bookmarkedTolets()->attach($tolet, ['priority' => 0, 'is_removed' => 0]);

        return redirect('/bookmark');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Selected  $selected
     * @return \Illuminate\Http\Response
     */
    public function destroy($tid, Request $request)
    {
        $request->user()->authorizeRoles(['reguser', 'admin']);

        $user = User::find(auth()->user()->id);
        $user   = $user->bookmarkedTolets()->where('tolet_id', $tid)->get()->first();
        $user->pivot->is_removed = 1;
        $user->pivot->save();

        return redirect('/bookmark');
    }
}
