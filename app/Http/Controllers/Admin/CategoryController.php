<?php

namespace App\Http\Controllers\Admin;

use App\Models\LocCat;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function show_category()
    {
        $category  = Category::latest()->paginate(15);
        $locations = Location::all();
        $locCat    = LocCat::all();


        return view('admin.category.show_category', compact('category', 'locations', 'locCat'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;

        $category->name = $request->name;

        $category->save();

        // {{ Category Location }}

        $locCat = new LocCat;

        $locCat->category_id = $category->id;

        if ($request->location_id == 0) {
            $locations = Location::all();

            foreach ($locations as $location) {
                $locCat = new LocCat;
                $locCat->category_id = $category->id;
                $locCat->location_id = $location->id;
                $locCat->save();
            }
        }

        return redirect()->back()->with('message', 'Category Added');
    }

   public function update_category(Request $request, $id)
{
    $category = Category::find($id);

    $category->name = $request->name;

    $category->save();

    if ($request->location_id == 0) {
        // Delete existing LocCat records for the category
        LocCat::where('category_id', $category->id)->delete();

        $locations = Location::all();

        foreach ($locations as $location) {
            $locCat = new LocCat;
            $locCat->category_id = $category->id;
            $locCat->location_id = $location->id;
            $locCat->save();
        }
    } else {
        // Delete existing LocCat records for the category
        LocCat::where('category_id', $category->id)->delete();

        $locCat = new LocCat;
        $locCat->category_id = $category->id;
        $locCat->location_id = $request->location_id;
        $locCat->save();
    }

    return redirect()->back()->with('message', 'Category Updated');
}

    public function delete_category($id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect()->back()->with('message', 'Category Deleted');
    }

    public function search_category(Request $request)
    {

        $query = $request->get('query');

        $category = Category::where('name', 'Like', "%$query%")->get();


        return response()->json($category);
    }
}
