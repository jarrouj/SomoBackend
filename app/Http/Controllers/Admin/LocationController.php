<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Locale;

class LocationController extends Controller
{
    public function show_location()
    {
        $location = Location::latest()->paginate(10);

        return view('admin.location.show_location' , compact('location'));
    }

    public function add_location(Request $request)
    {
        $location = new Location;

        $location->address       = $request->address;
        $location->country       = $request->country;
        $location->phone_number  = $request->phone_number;
        $location->email         = $request->email;
        $location->location_link = $request->location_link;

        $location->save();

        return redirect()->back()->with('message' , 'Location Added');
    }

    public function update_location(Request $request, $id)
    {
        $location = Location::find($id);

        $location->address       = $request->address;
        $location->country       = $request->country;
        $location->phone_number  = $request->phone_number;
        $location->email         = $request->email;
        $location->location_link = $request->location_link;

        $location->save();

        return redirect()->back()->with('message' , 'Location Updated');
    }

    public function delete_location($id)
    {
        $location = Location::find($id);

        $location->delete();

        return redirect()->back()->with('message' , 'Location Deleted');

    }
}
