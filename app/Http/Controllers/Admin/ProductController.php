<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->with(['categories', 'tags'])->paginate(10);

        return view('admin.products.index', compact('products'));


        // return view('admin.products.index')
        //     ->with('products', Product::orderBy('id', 'desc'))->paginate(10)
        //     ->with(['categories', 'tags']);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.products.create', compact('categories', 'tags'));

        // return view('admin.products.create')
        //     ->with('categories', Category::all())
        //     ->with('tags', Tag::all());


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => 'nullable',
            'description' => 'nullable|max:255',
            'images' => 'nullable|array',
        ]);

        $data['slug'] = str()->slug($request->name);

        if ($request->hasFile('images')) {
            $images = [];

            foreach ($data['images'] as $image) {
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('product_images', $filename, 'public');
                array_push($images, $filename);
            }

            $data['images'] = $images;
        }

        $product = Product::create($data);
        $product->categories()->attach($request->categories);
        $product->tags()->attach($request->tags);

        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // $productImages = ProductImage::all();
        $categories = Category::all();
        $tags = Tag::all();

        // $product = $product->with(['productImage', 'categories', 'tags']);


        return view('admin.products.edit', compact(['product', 'categories', 'tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => 'required',
            'description' => 'max:255',
            'images' => 'nullable|array',
        ]);

        $data['slug'] = str()->slug($request->name);

        if ($request->hasFile('images')) {
            $product->images ? $images = $product->images : $images = [];

            foreach ($data['images'] as $key => $image) {
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('product_images', $filename, 'public');
                array_push($images, $filename);
            }

            $data['images'] = $images;
        }

        $product->categories()->sync($request->categories);
        $product->tags()->sync($request->tags);
        $product->update($data);

        return redirect()->route('admin.products.index');
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

    public function removeImage($pid, $iid)
    {
        $product = Product::find($pid);
        $image_array = $product->images;

        $old_files = 'storage/product_images/' . $image_array[$iid];
        unlink($old_files);

        unset($image_array[$iid]);

        $product->update(['images' => $image_array]);

        return redirect()->route('admin.products.edit', $pid);
    }

    public function remove($id)
    {
        $image = ProductImage::find($id);

        if (!$image) abort(404);

        $file = 'product_images/' . $image->filename;

        unlink(public_path($file));

        $image->delete();

        // if (!$image) abort(404);

        // if (is_file($image->filename)) {
        //     return 'yes';
        // } else {
        //     return 'no ' . storage_path($image->filename) . '<br>' . public_path($image->filename) . '<br>' . url('public/' . $image->filename);
        // }

        // Storage::delete($image->filename);
        // unlink(storage_path($image->filename));

        return back();
    }
}
