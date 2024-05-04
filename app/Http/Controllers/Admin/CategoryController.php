<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show_category()
    {
        $category = Category::latest()->paginate(10);

        return view('admin.category.show_category' , compact('category'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;

        $category->name = $request->name;

        $category->save();

        return redirect()->back()->with('message' , 'Category Added');
    }

    public function update_category(Request $request , $id)
    {
        $category = Category::find($id);

        $category->name = $request->name;

        $category->save();

        return redirect()->back()->with('message' , 'Category Updated');
    }

    public function delete_category($id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect()->back()->with('message' , 'Category Deleted');

    }

    public function search_category(Request $request)
    {

        $query = $request->get('query');

        $category = Category::where('name', 'Like', "%$query%")->get();


        return response()->json($category);
    }
}
