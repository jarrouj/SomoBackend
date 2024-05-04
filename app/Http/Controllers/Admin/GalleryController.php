<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;


use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    public function show_gallery()
    {
        $gallery = Gallery::latest()->paginate(10);

        return view('admin.gallery.show_gallery', compact('gallery'));
    }

    public function add_gallery(Request $request)
    {
        // $gallery = new Gallery;

        $images = $request->img;

        foreach ($images as $img) {

            if ($img) {
                $imgname = Str::random(20) . '.' . $img->getClientOriginalExtension();

                //Save the original image
                $img->move('gallery', $imgname);

                //change the image quality using Intervention Image
                $img = Image::make(public_path('gallery/' . $imgname));

                $img->encode($img->extension, 10)->save(public_path('gallery/' . $imgname));

                $gallery = new Gallery;
                $gallery->img = $imgname;
                $gallery->save();

            }

        }
        return redirect()->back()->with('message', 'Gallery Added');
    }

    public function delete_gallery($id)
    {
        $gallery = Gallery::find($id);

        $gallery->delete();

        return redirect()->back()->with('message' , 'Gallery Deleted');
    }
}
