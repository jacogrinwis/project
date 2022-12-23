<?php

namespace App\Http\Controllers\admin;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();

        return view('admin.images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'images' => 'required|image|mimes:png,jpg,jpeg', // |max:2048
        ]);

        $file = time() . '.' . $request->images->extension();

        $request->images->move(public_path('uploads'), $file);

        Image::create([
            'name' => $request->name,
            'image' => $file,
        ]);

        return back()->with('success', 'Image uploaded Successfully!')->with('image', $file)->with('name', $request->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.images.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::find($id);

        return view('admin.images.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        if (!$image) abort(404);

        unlink(public_path('uploads/' . $image->image));

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'images' => 'required|image|mimes:png,jpg,jpeg', // |max:2048
        ]);

        $file = time() . '.' . $request->images->extension();

        $request->images->move(public_path('uploads'), $file);

        $image->update([
            'name' => $request->name,
            'image' => $file,
        ]);

        return back()->with('success', 'Image uploaded Successfully!')->with('image', $file)->with('name', $request->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
