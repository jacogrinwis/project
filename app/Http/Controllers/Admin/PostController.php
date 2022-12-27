<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Image;
use App\Models\Category;
use App\Models\PostImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->with(['categories', 'tags'])->paginate(10);

        return view('admin.posts.index', compact('posts'));
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

        return view('admin.posts.create2', compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'string',
            'body' => 'nullable|string',
            // 'cover' => 'required|image',
        ]);

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(\public_path('posts/cover/'), $fileName);

            $post = Post::create([
                'published' => $request->published == 'published' ? 1 : 0,
                'title' => $request->title,
                'slug' => $request->slug, // str()->slug($request->title),
                'cover' => $fileName,
                'body' => $request->body,
            ]);
        }

        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $request['post_id'] = $post->id;
                $request['image'] = $fileName;
                $file->move(\public_path('posts/images/'), $fileName);
                PostImage::create($request->all());
            }
        }

        return redirect()->route('admin.posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.posts.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id); //->with(['categories', 'tags']);
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit2', compact('post', 'categories', 'tags'));
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
        // dd($request);

        $post = Post::findOrFail($id);

        if ($request->hasFile('cover')) {
            if (File::exists('posts/cover/'. $post->cover)) {
                File::delete('posts/cover/'. $post->cover);
            }
            $file = $request->file('cover');
            $post->cover = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(\public_path('posts/cover/'), $post->cover);
            $request['cover'] = $post->cover;
        }

        $post->update([
            'published' => $request->published == 'published' ? 1 : 0,
            'title' => $request->title,
            'slug' => $request->slug, // str()->slug($request->title),
            'cover' => $post->cover,
            'body' => $request->body,
        ]);

        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $request['post_id'] = $id;
                $request['image'] = $fileName;
                $file->move(\public_path('posts/images/'), $fileName);
                PostImage::create($request->all());
            }
        }

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if (File::exists('posts/cover/' . $post->cover)) {
            File::delete('posts/cover/'. $post->cover);
        }

        $images = PostImage::where('post_id', $post->id)->get();
        foreach ($images as $image) {
            if (File::exists('posts/images/' . $image->image)) {
                File::delete('posts/images/' . $image->image);
            }
        }

        $post->delete();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_cover($id)
    {
        $post = Post::findOrFail($id);

        if (File::exists('posts/cover/'. $post->cover)) {
            File::delete('posts/cover/'. $post->cover);
        }

        $post->update([
            'cover' => null,
        ]);

        return back();
    }

    public function upload_images(Request $request, $id)
    {
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $request['post_id'] = $id;
                $request['image'] = $fileName;
                $file->move(\public_path('posts/images/'), $fileName);
                PostImage::create($request->all());
            }
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_image($id)
    {
        $image = PostImage::findOrFail($id);

        if (File::exists('posts/images/'. $image->image)) {
            File::delete('posts/images/'. $image->image);
        }

        PostImage::find($id)->delete();

        return redirect()->route('admin.posts.index');
    }
}
