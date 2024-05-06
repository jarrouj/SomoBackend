<?php

namespace App\Http\Controllers\Admin;

use App\Models\Show;
use App\Models\Category;
use App\Models\RetailMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RetailMenuController extends Controller
{
    public function show_retail_menu()
    {
        $RetailMenu = RetailMenu::latest()->paginate(20);
        $categories = Category::all();
        $show    = Show::find(1);


        return view('admin.retail_menu.show_retail_menu' , compact('RetailMenu' , 'categories' , 'show'));
    }

    public function add_retail_menu(Request $request)
    {
        $RetailMenu = new RetailMenu;

        $RetailMenu->name        = $request->name;
        $RetailMenu->ingredients = $request->ingredients;
        $RetailMenu->price       = $request->price;
        $RetailMenu->category_id = $request->category_id;

        $RetailMenu->save();

        return redirect()->back()->with('message' , 'Retail Menu Added');
    }

    public function update_retail_menu(Request $request , $id)
    {
        $RetailMenu = RetailMenu::find($id);

        $RetailMenu->name        = $request->name;
        $RetailMenu->ingredients = $request->ingredients;
        $RetailMenu->price       = $request->price;
        $RetailMenu->category_id = $request->category_id;

        $RetailMenu->save();

        return redirect()->back()->with('message' , 'Retail Menu Updated');
    }

    public function delete_retail_menu($id)
    {
        $RetailMenu = RetailMenu::find($id);

        $RetailMenu->delete();

        return redirect()->back()->with('message' , 'Retail Menu Deleted');

    }

    public function search_retail_menu(Request $request)
    {

        $query = $request->get('query');

        $menu = RetailMenu::where('name', 'Like', "%$query%")->get();


        return response()->json($menu);
    }
}
