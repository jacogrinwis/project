<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostCoverController extends Controller
{
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
            File::delete('posts/cover/' . $post->cover);
        }

        $post->update(['cover' => null]);

        return back();
    }
}
