<?php

namespace App\Http\Controllers\Admin;

use App\Models\Wwd;
use App\Models\Show;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class WwdController extends Controller
{
    public function show_wwd()
    {
        $wwd = Wwd::latest()->paginate(10);
        $show    = Show::find(1);


        return view('admin.wwd.show_wwd' , compact('wwd' , 'show'));
    }

    public function add_wwd(Request $request)
    {
        $wwd = new Wwd;

        $wwd->title = $request->title;
        $wwd->text  = $request->text;

        $icon = $request->icon;

        if($icon)
        {
            $iconname = Str::random(20) . '.' . $icon->getClientOriginalExtension();

            //Save the original image
            $request->icon->move('wwd', $iconname);

            //change the image quality using Intervention Image
            $icon = Image::make(public_path('wwd/' . $iconname));

            $icon->encode($icon->extension, 10)->save(public_path('wwd/' . $iconname));

            $wwd->icon = $iconname;
        }

        $wwd->save();

        return redirect()->back()->with('message' , 'Wwd Added');

    }

    public function update_wwd(Request $request , $id)
    {
        $wwd = Wwd::find($id);

        $wwd->title = $request->title;
        $wwd->text  = $request->text;

        $icon = $request->icon;

        if($icon)
        {
            $iconname = Str::random(20) . '.' . $icon->getClientOriginalExtension();

            //Save the original image
            $request->icon->move('wwd', $iconname);

            //change the image quality using Intervention Image
            $icon = Image::make(public_path('wwd/' . $iconname));

            $icon->encode($icon->extension, 10)->save(public_path('wwd/' . $iconname));

            $wwd->icon = $iconname;
        }

        $wwd->save();

        return redirect()->back()->with('message' , 'Wwd Updated');
    }

    public function delete_wwd($id)
    {
        $wwd = Wwd::find($id);

        $wwd->delete();

        return redirect()->back()->with('message' , 'Wwd Deleted');
    }
}
