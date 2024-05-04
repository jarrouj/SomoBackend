<?php

namespace App\Http\Controllers\Admin;

use App\Models\Show;
use App\Models\Opening;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OpeningController extends Controller
{
    public function show_opening()
    {
        $opening = Opening::latest()->paginate(10);
        $show    = Show::find(1);

        return view('admin.opening.show_opening' , compact('opening' , 'show'));
    }

    public function add_opening(Request $request)
    {
        $opening = new Opening;

        $opening->days = $request->days;
        $opening->time = $request->time;

        $opening->save();

        return redirect()->back()->with('message' , 'Opening Added');
    }

    public function update_opening(Request $request , $id)
    {
        $opening = Opening::find($id);

        $opening->days = $request->days;
        $opening->time = $request->time;

        $opening->save();

        return redirect()->back()->with('message' , 'Opening Updated');
    }

    public function delete_opening($id)
    {
        $opening = Opening::find($id);

        $opening->delete();

        return redirect()->back()->with('message' , 'Opening Deleted');

    }
}
