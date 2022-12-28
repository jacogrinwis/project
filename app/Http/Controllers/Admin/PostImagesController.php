<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PostImagesController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = PostImage::FindOrFail($id);

        if (File::exists('posts/images/' . $image->image)) {
            File::delete('posts/images/' . $image->image);
        }

        $image->delete();

        return back();
    }
}
