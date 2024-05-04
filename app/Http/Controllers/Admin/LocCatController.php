<?php

namespace App\Http\Controllers\Admin;

use App\Models\LocCat;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocCatController extends Controller
{
    public function show_loc_cat()
    {
        $locCat     = LocCat::latest()->paginate(10);
        $categories = Category::all();
        $locations  = Location::all();

        return view('admin.locCat.show_loc_cat' , compact('locCat' , 'categories' , 'locations'));
    }

    public function add_loc_cat(Request $request)
    {
        $locCat = new LocCat;

        $locCat->category_id = $request->category_id;
        $locCat->location_id = $request->location_id;

        $locCat->save();

        return redirect()->back()->with('message' , 'Category Location Added');
    }

    public function update_loc_cat(Request $request , $id)
    {
        $locCat = LocCat::find($id);

        $locCat->category_id = $request->category_id;
        $locCat->location_id = $request->location_id;

        $locCat->save();

        return redirect()->back()->with('message' , 'Category Location Updated');

    }

    public function delete_loc_cat($id)
    {
        $locCat = LocCat::find($id);

        $locCat->delete();

        return redirect()->back()->with('message' , 'Category Location Deleted');
    }
}
