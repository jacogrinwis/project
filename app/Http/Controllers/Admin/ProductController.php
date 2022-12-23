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
        // $categories = Category::all();
        // $tags = Tag::all();
        // $products = Product::orderBy('id', 'desc')->paginate(10);
        $products = Product::orderBy('id', 'desc')->with(['productImages', 'categories', 'tags'])->paginate(10);

        // return view('admin.products.index', compact([
        //     'categories',
        //     'tags',
        //     'products',
        // ]));
        return view('admin.products.index', compact('products'));
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
            'price' => 'required',
            'description' => 'max:255',
            //'images' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'slug' => str()->slug($request->name),
            'price' => $request->price,
            'description' => $request->description,
            //'images' => $image_path,
        ]);

        $product->categories()->attach($request->categories);
        $product->tags()->attach($request->tags);

        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                // $path = $image->store('image');



                // $file = time() . '.' . $request->images->extension();
                $file = time() . '.' . $image->extension();
                // $request->images->move(public_path('product_images'), $file);
                $image->move(public_path('product_images'), $file);



                ProductImage::create([
                    'url' => $file,
                    'product_id' => $product->id,
                ]);
            }
        }

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
        $productImages = ProductImage::all();
        $categories = Category::all();
        $tags = Tag::all();

        // $product = $product->with(['productImage', 'categories', 'tags']);


        return view('admin.products.edit', compact(['product', 'productImages', 'categories', 'tags']));
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
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        // ]);

        // $product->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        // ]);
        // $product->syncRoles($request->role);

        // return redirect()->route('admin.users.index');

        // if (!$image) abort(404);

        // unlink(public_path('uploads/' . $image->image));

        // foreach ($product->productImage())

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => 'required',
            'description' => 'max:255',
            //'images' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $product->update([
            'name' => $request->name,
            'slug' => str()->slug($request->name),
            'price' => $request->price,
            'description' => $request->description,
            //'images' => $image_path,
        ]);

        $product->categories()->sync($request->categories);
        $product->tags()->sync($request->tags);

        foreach ($request->file('images') as $image) {



            // $path = $image->store('image', 'public');


            $file = time() . '.' . $image->extension();
            $image->move(public_path('product_images'), $file);



            $product->productImages()->update([
                'url' => $file,
                'product_id' => $product->id,
            ]);
        }

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

    public function removeImage($id)
    {
        $image = ProductImage::find($id);

        if (!$image) abort(404);

        unlink(public_path('uploads/' . $image->image));

        // if (!$image) abort(404);

        // if (is_file($image->url)) {
        //     return 'yes';
        // } else {
        //     return 'no ' . storage_path($image->url) . '<br>' . public_path($image->url) . '<br>' . url('public/' . $image->url);
        // }

        // Storage::delete($image->url);
        // unlink(storage_path($image->url));

        // return back();
    }
}
