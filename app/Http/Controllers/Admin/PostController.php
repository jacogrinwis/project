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
use App\Http\Requests\CreatePostRequest;

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

        return view('admin.posts.create2', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('posts/cover/'), $fileName);
            $data['cover'] = $fileName;
        }

        $post = Post::create($data);
        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $data['post_id'] = $post->id;
                $data['image'] = $fileName;
                $file->move(public_path('posts/images/'), $fileName);
                $post->postImages()->create($data);
            }
        }

        return redirect()->route('admin.posts.index')->with('success', 'Post has successfully created!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_old(CreatePostRequest $request)
    {
        // dd($request);

        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'slug' => 'string',
        //     'body' => 'nullable|string',
        //     // 'cover' => 'required|image',
        // ]);

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('posts/cover/'), $fileName);

            $request->merge(['cover' => $fileName]);
        }

        $post = Post::create([
            'published' => $request->boolean('published'),
            'title' => $request->title,
            'slug' => $request->slug,
            // 'cover' => $fileName ?? null,
            'cover' => $request->cover,
            'body' => $request->body,
        ]);

        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $request['post_id'] = $post->id;
                $request['image'] = $fileName;
                $file->move(public_path('posts/images/'), $fileName);
                PostImage::create($request->all());
            }
        }

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post has successfully created!');
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
    public function edit(Post $post)
    {
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
    public function update(CreatePostRequest $request, Post $post)
    {
        $data = $request->all();
        $data['published'] = $request->boolean('published');

        if ($request->hasFile('cover')) {
            if (File::exists('posts/cover/' . $post->cover)) {
                File::delete('posts/cover/' . $post->cover);
            }
            $cover = $request->file('cover');
            $post->cover = uniqid() . '.' . $cover->getClientOriginalExtension();
            $cover->move(\public_path('posts/cover/'), $post->cover);
            $data['cover'] = $post->cover;
        }

        $post->update($data);
        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $data['post_id'] = $post->id;
                $data['image'] = $imageName;
                $image->move(public_path('posts/images/'), $imageName);
                $post->postImages()->create($data);
            }
        }

        return redirect()->route('admin.posts.index')->with('success', 'Post has successfully updated!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_old(CreatePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('cover')) {
            if (File::exists('posts/cover/' . $post->cover)) {
                File::delete('posts/cover/' . $post->cover);
            }
            $file = $request->file('cover');
            $post->cover = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(\public_path('posts/cover/'), $post->cover);
            // $request->cover = $post->cover;
            $data['cover'] = $post->cover;
        }

        // $post->update([
        //     'published' => $request->boolean('published'),
        //     'title' => $request->title,
        //     'slug' => $request->slug,
        //     'cover' => $post->cover,
        //     'body' => $request->body,
        // ]);

        $post->update($data);

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

        return redirect()->route('admin.posts.index')->with('success', 'Post has successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (File::exists('posts/cover/' . $post->cover)) {
            File::delete('posts/cover/' . $post->cover);
        }

        $images = PostImage::where('post_id', $post->id)->get();
        foreach ($images as $image) {
            if (File::exists('posts/images/' . $image->image)) {
                File::delete('posts/images/' . $image->image);
            }
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post has successfully deleted!');
    }



    // public function upload_images(Request $request, $id)
    // {
    //     if ($request->hasFile('images')) {
    //         $files = $request->file('images');
    //         foreach ($files as $file) {
    //             $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
    //             $request['post_id'] = $id;
    //             $request['image'] = $fileName;
    //             $file->move(\public_path('posts/images/'), $fileName);
    //             PostImage::create($request->all());
    //         }
    //     }

    //     return back();
    // }


}
