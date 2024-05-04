<?php

namespace App\Http\Controllers\Admin;

use App\Models\Show;
use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function show_about()
    {
        $about = About::find(1);
        $show    = Show::find(1);


        return view('admin.about.show_about',compact('about' , 'show'));

    }

    public function update_about(Request $request , $id)
    {
        $about = About::find($id);

        $about->title = $request->title;
        $about->text  = $request->text;
        $about->whyus = $request->whyus;

        $img = $request->img;

        if($img)
        {
            $imgname = Str::random(20) . '.' . $img->getClientOriginalExtension();

            //Save the original image
            $request->img->move('about', $imgname);

            //change the image quality using Intervention Image
            $img = Image::make(public_path('about/' . $imgname));

            $img->encode($img->extension, 10)->save(public_path('about/' . $imgname));

            $about->img = $imgname;
        }

        $about->save();

        return redirect()->back()->with('message' , 'About Updated');
    }
}
