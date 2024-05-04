<?php

namespace App\Http\Controllers\Admin;

use App\Models\Show;
use App\Models\Mission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MissionController extends Controller
{
    public function show_mission()
    {
        $mission = Mission::latest()->paginate(10);
        $show    = Show::find(1);

        return view('admin.mission.show_mission' , compact('mission' , 'show'));
    }

    public function add_mission(Request $request)
    {
        $mission = new Mission;

        $mission->title = $request->title;

        $mission->save();

        return redirect()->back()->with('message' , 'Mission Added');
    }

    public function update_mission(Request $request , $id)
    {
        $mission = Mission::find($id);

        $mission->title = $request->title;

        $mission->save();

        return redirect()->back()->with('message' , 'Mission Updated');
    }

    public function delete_mission($id)
    {
        $mission = Mission::find($id);

        $mission->delete();

        return redirect()->back()->with('message' , 'Mission Deleted');

    }
}
