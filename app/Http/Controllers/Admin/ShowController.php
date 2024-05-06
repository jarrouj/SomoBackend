<?php

namespace App\Http\Controllers\Admin;

use App\Models\Show;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function team(Request $request)
    {
       $showall = Show::find(1);

       $showall->team_sh = $request->datash;

       $showall->save();

       if($request->datash == 1)
       {
        return redirect()->back()->with('message' , 'Team Section Visible');
       }else
       {
      return redirect()->back()->with('message' , 'Team Section Hidden');
      }
    }

    public function mission(Request $request)
    {
       $showall = Show::find(1);

       $showall->mission_sh = $request->datash;

       $showall->save();

       if($request->datash == 1)
       {
        return redirect()->back()->with('message' , 'Mission Section Visible');
       }else
       {
      return redirect()->back()->with('message' , 'Mission Section Hidden');
      }
    }

    public function about(Request $request)
    {
       $showall = Show::find(1);

       $showall->about_sh = $request->datash;

       $showall->save();

       if($request->datash == 1)
       {
        return redirect()->back()->with('message' , 'About Section Visible');
       }else
       {
      return redirect()->back()->with('message' , 'About Section Hidden');
      }
    }

    public function wwd(Request $request)
    {
       $showall = Show::find(1);

       $showall->wwd_sh = $request->datash;

       $showall->save();

       if($request->datash == 1)
       {
        return redirect()->back()->with('message' , 'Wwd Section Visible');
       }else
       {
      return redirect()->back()->with('message' , 'Wwd Section Hidden');
      }
    }

    public function blog(Request $request)
    {
       $showall = Show::find(1);

       $showall->blog_sh = $request->datash;

       $showall->save();

       if($request->datash == 1)
       {
        return redirect()->back()->with('message' , 'Blog Section Visible');
       }else
       {
      return redirect()->back()->with('message' , 'Blog Section Hidden');
      }
    }

    public function opening(Request $request)
    {
       $showall = Show::find(1);

       $showall->opening_sh = $request->datash;

       $showall->save();

       if($request->datash == 1)
       {
        return redirect()->back()->with('message' , 'Opening Section Visible');
       }else
       {
      return redirect()->back()->with('message' , 'Opening Section Hidden');
      }
    }

    public function menu(Request $request)
    {
       $showall = Show::find(1);

       $showall->menu_sh = $request->datash;

       $showall->save();

       if($request->datash == 1)
       {
        return redirect()->back()->with('message' , 'Menu Section Visible');
       }else
       {
      return redirect()->back()->with('message' , 'Menu Section Hidden');
      }
    }

    public function retail_menu(Request $request)
    {
       $showall = Show::find(1);

       $showall->retail_menu_sh = $request->datash;

       $showall->save();

       if($request->datash == 1)
       {
        return redirect()->back()->with('message' , 'Retail Menu Section Visible');
       }else
       {
      return redirect()->back()->with('message' , 'Retail Menu Section Hidden');
      }
    }
}
