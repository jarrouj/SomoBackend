<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Show;
use App\Models\Team;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class TeamController extends Controller
{
    public function show_team()
    {
        $team = Team::latest()->paginate(10);
        $show = Show::find(1);

        return view('admin.team.show_team' , compact('team' , 'show'));
    }

    public function add_team(Request $request)
    {
        $team = new Team;

        $team->name = $request->name;
        $team->role = $request->role;

        $img = $request->img;

        if($img)
        {
            $imgname = Str::random(20) . '.' . $img->getClientOriginalExtension();

            //Save the original image
            $request->img->move('team', $imgname);

            //change the image quality using Intervention Image
            $img = Image::make(public_path('team/' . $imgname));

            $img->encode($img->extension, 10)->save(public_path('team/' . $imgname));

            $team->img = $imgname;
        }

        $team->save();

        return redirect()->back()->with('message' , 'Team Member Added');
    }

    public function update_team(Request $request , $id)
    {
        $team = Team::find($id);

        $team->name = $request->name;
        $team->role = $request->role;

        $img = $request->img;

        if($img)
        {
            $imgname = Str::random(20) . '.' . $img->getClientOriginalExtension();

            //Save the original image
            $request->img->move('team', $imgname);

            //change the image quality using Intervention Image
            $img = Image::make(public_path('team/' . $imgname));

            $img->encode($img->extension, 10)->save(public_path('team/' . $imgname));

            $team->img = $imgname;
        }

        $team->save();

        return redirect()->back()->with('message' , 'Team Member Updated');
    }

    public function delete_team($id)
    {
        $team = Team::find($id);

        $team->delete();

        return redirect()->back()->with('message' , 'Team Member Deleted');
    }
}
