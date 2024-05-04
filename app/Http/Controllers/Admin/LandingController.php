<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Landing;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class LandingController extends Controller
{
    public function show_landing()
    {
        $landing = Landing::latest()->paginate(10);

        return view('admin.landing.show_landing' , compact('landing'));
    }

    public function add_landing(Request $request)
    {
        $landing = new Landing;

        $landing->title = $request->title;
        $landing->text  = $request->text;

        $img = $request->img;

        if($img)
        {
            $imgname = Str::random(20) . '.' . $img->getClientOriginalExtension();

            //Save the original image
            $request->img->move('landing', $imgname);

            //change the image quality using Intervention Image
            $img = Image::make(public_path('landing/' . $imgname));

            $img->encode($img->extension, 10)->save(public_path('landing/' . $imgname));

            $landing->img = $imgname;
        }

        $landing->save();

        return redirect()->back()->with('message' , 'Landing Added');

    }

    public function update_landing(Request $request , $id)
    {
        $landing = Landing::find($id);

        $landing->title = $request->title;
        $landing->text  = $request->text;

        $img = $request->img;

        if($img)
        {
            $imgname = Str::random(20) . '.' . $img->getClientOriginalExtension();

            //Save the original image
            $request->img->move('landing', $imgname);

            //change the image quality using Intervention Image
            $img = Image::make(public_path('landing/' . $imgname));

            $img->encode($img->extension, 10)->save(public_path('landing/' . $imgname));

            $landing->img = $imgname;
        }

        $landing->save();

        return redirect()->back()->with('message' , 'Landing Updated');

    }

    public function delete_landing($id)
    {
        $landing = Landing::find($id);

        $landing->delete();

        return redirect()->back()->with('message' , 'Landing Deleted');
    }
}
