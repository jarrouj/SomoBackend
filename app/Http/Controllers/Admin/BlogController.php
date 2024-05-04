<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Show;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function show_blog()
    {
        $blog = Blog::latest()->paginate(10);
        $show    = Show::find(1);


        return view('admin.blog.show_blog' , compact( 'blog' , 'show'));
    }

    public function add_blog(Request $request)
    {
        $blog = new Blog;

        $blog->title    = $request->title;
        $blog->text     = $request->text;
        $blog->subtitle = $request->subtitle;
        $blog->link     = $request->link;

        $img = $request->img;

        if($img)
        {
            $imgname = Str::random(20) . '.' . $img->getClientOriginalExtension();

            //Save the original image
            $request->img->move('blog', $imgname);

            //change the image quality using Intervention Image
            $img = Image::make(public_path('blog/' . $imgname));

            $img->encode($img->extension, 10)->save(public_path('blog/' . $imgname));

            $blog->img = $imgname;
        }

        $blog->save();

        return redirect()->back()->with('message' , 'Blog Added');
    }

    public function update_blog(Request $request , $id)
    {
        $blog = Blog::find($id);

        $blog->title    = $request->title;
        $blog->text     = $request->text;
        $blog->subtitle = $request->subtitle;
        $blog->link     = $request->link;

        $img = $request->img;

        if($img)
        {
            $imgname = Str::random(20) . '.' . $img->getClientOriginalExtension();

            //Save the original image
            $request->img->move('blog', $imgname);

            //change the image quality using Intervention Image
            $img = Image::make(public_path('blog/' . $imgname));

            $img->encode($img->extension, 10)->save(public_path('blog/' . $imgname));

            $blog->img = $imgname;
        }

        $blog->save();

        return redirect()->back()->with('message' , 'Blog Updated');

    }

    public function delete_blog($id)
    {
        $blog = Blog::find($id);

        $blog->delete();

        return redirect()->back()->with('message' , 'Blog Deleted');
    }
}
