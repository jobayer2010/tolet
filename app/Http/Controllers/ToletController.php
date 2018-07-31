<?php

namespace App\Http\Controllers;

use App\Tolet;
use App\ToletImage;
use Illuminate\Http\Request;

class ToletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tolets = Tolet::all();
        return view('tolet.index')->with('tolets', $tolets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$path = storage_path()."\location.json";
        //$location = json_decode(file_get_contents($path), true);
        return view('tolet.create');
        //return $location;
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
            'location' => 'required',
            'description' => 'required',
            'area' => 'required',
            'bed' => 'required',
            'balcony' => 'required',
            'price' => 'required',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $tolet = new Tolet();
        $tolet->location = $request->input('location');
        $tolet->description = $request->input('description');
        $tolet->area = $request->input('area');
        $tolet->bed = $request->input('bed');
        $tolet->balcony = $request->input('balcony');
        $tolet->bath = $request->input('bath');
        $tolet->price = $request->input('price');
        $tolet->is_negotiable = true;
        $tolet->user_id = auth()->user()->id;
        $tolet->save();

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $name=$image->getClientOriginalName();
                $image->move(base_path().'/public/images/', 'tolet_'.$tolet->id.$name);
                $toletImage= new ToletImage();
                $toletImage->image_url= '/images/'.'tolet_'.$tolet->id.$name;
                $toletImage->tolet_id= $tolet->id;
                $toletImage->save();
            }
        }
        return redirect('/tolet');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tolet  $tolet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tolet = Tolet::find($id);
        $images = ToletImage::where('tolet_id', $tolet->id)->get();
        $data = array(
            'tolet'=> $tolet,
            'images'=> $images
        );

        return view('tolet.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tolet  $tolet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tolet = Tolet::find($id);
        $images = ToletImage::where('tolet_id', $tolet->id)->get();

        $data = array(
            'tolet'=> $tolet,
            'images'=> $images
        );
        return view('tolet.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tolet  $tolet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'location' => 'required',
            'description' => 'required',
            'area' => 'required',
            'bed' => 'required',
            'balcony' => 'required',
            'price' => 'required',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $tolet =Tolet::find($id);
        $tolet->location = $request->input('location');
        $tolet->description = $request->input('description');
        $tolet->area = $request->input('area');
        $tolet->bed = $request->input('bed');
        $tolet->balcony = $request->input('balcony');
        $tolet->bath = $request->input('bath');
        $tolet->price = $request->input('price');
        $tolet->is_negotiable = true;
        $tolet->user_id = auth()->user()->id;
        $tolet->save();

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $name=$image->getClientOriginalName();
                $image->move(base_path().'/public/images/', 'tolet_'.$tolet->id.$name);
                
                $toletImage= new ToletImage();
                $toletImage->image_url= '/images/'.'tolet_'.$tolet->id.$name;
                $toletImage->tolet_id= $tolet->id;
                $toletImage->save();
            }
        }
        return redirect('/tolet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tolet  $tolet
     * @return \Illuminate\Http\Response
     */
    public function destroy($tolet)
    {
        $tolet = Tolet::destroy($tolet);

        return redirect()->route('tolet.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\id  $tolet
     * @return \Illuminate\Http\Response
     */
    public function destroyImage($id, $pid)
    {
        $image = ToletImage::destroy($id);

        //return redirect()->route('tolet.edit', ['id' => $pid]);
    }
}
