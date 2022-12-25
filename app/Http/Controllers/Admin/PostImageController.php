<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostImageController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $post = Post::findOrFail($id);

        // if (File::exists('posts/cover/' . $post->cover)) {
        //     File::delete('posts/cover/'. $post->cover);
        // }

        // $images = PostImage::where('post_id', $post->id)->get();
        // foreach ($images as $image) {
        //     if (File::exists('posts/images/' . $image->image)) {
        //         File::delete('posts/images/' . $image->image);
        //     }
        // }

        // $post->delete();

        // return back();
    }
}
