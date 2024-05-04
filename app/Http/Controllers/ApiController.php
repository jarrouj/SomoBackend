<?php

namespace App\Http\Controllers;

use App\Models\Wwd;
use App\Models\Blog;
use App\Models\Menu;
use App\Models\Show;
use App\Models\Team;
use App\Models\About;
use App\Models\Social;
use App\Models\Gallery;
use App\Models\Landing;
use App\Models\Mission;
use App\Models\Opening;
use App\Models\Category;
use App\Models\Location;
use App\Models\LocCat;
use App\Models\RetailMenu;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getAbout()
    {
        $about = About::find(1);

        return response()->json($about);

    }

    public function getBlog()
    {
        $blog = Blog::all();

        return response()->json($blog);
    }

    public function getCategoryMenu()
    {
        $categoryIds = Menu::select('category_id')
            ->distinct()
            ->pluck('category_id');

        $categories = Category::whereIn('id', $categoryIds)->get();

        $category = $categories->unique();

        return $category;
    }

    public function getCategoryRetail()
    {
        $categoryIds = RetailMenu::select('category_id')
            ->distinct()
            ->pluck('category_id');

        $categories = Category::whereIn('id', $categoryIds)->get();

        $category = $categories->unique();

        return $category;
    }


    public function getMenu()
    {
        $menu = Menu::all();

        return response()->json($menu);
    }

    public function getRetailMenu()
    {
        $retail_menu = RetailMenu::all();

        return response()->json($retail_menu);
    }

    public function getGallery()
    {
        $gallery = Gallery::all();

        return response()->json($gallery);
    }

    public function getLanding()
    {
        $landing = Landing::all();

        return response()->json($landing);
    }

    public function getLocation()
    {
        $location = Location::all();

        return response()->json($location);
    }

    public function getMission()
    {
        $mission = Mission::all();

        return response()->json($mission);
    }

    public function getOpening()
    {
        $opening = Opening::all();

        return response()->json($opening);
    }

    public function getReservation()
    {
        $reservation = Reservation::all();

        return response()->json($reservation);
    }

    public function getShow()
    {
        $show = Show::find(1);

        return response()->json($show);
    }

    public function getSocial()
    {
        $social = Social::find(1);

        return response()->json($social);
    }

    public function getTeam()
    {
        $team = Team::all();

        return response()->json($team);
    }

    public function getwwd()
    {
        $wwd = Wwd::all();

        return response()->json($wwd);
    }

    public function getLocCat()
    {
        $locCat = LocCat::all();

        return response()->json($locCat);
    }

}
