<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Show;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function show_menu()
    {
        $menu = Menu::latest()->paginate(20);
        $categories = Category::all();
        $show    = Show::find(1);


        return view('admin.menu.show_menu' , compact('menu' , 'categories' , 'show'));
    }

    public function add_menu(Request $request)
    {
        $menu = new Menu;

        $menu->name        = $request->name;
        $menu->ingredients = $request->ingredients;
        $menu->price       = $request->price;
        $menu->category_id = $request->category_id;

        $menu->save();

        return redirect()->back()->with('message' , 'Menu Added');
    }

    public function update_menu(Request $request , $id)
    {
        $menu = Menu::find($id);

        $menu->name        = $request->name;
        $menu->ingredients = $request->ingredients;
        $menu->price       = $request->price;
        $menu->category_id = $request->category_id;

        $menu->save();

        return redirect()->back()->with('message' , 'Menu Updated');
    }

    public function delete_menu($id)
    {
        $menu = Menu::find($id);

        $menu->delete();

        return redirect()->back()->with('message' , 'Menu Deleted');

    }

    public function search_menu(Request $request)
    {

        $query = $request->get('query');

        $menu = Menu::where('name', 'Like', "%$query%")->get();


        return response()->json($menu);
    }
}
