<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\Team;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\RetailMenu;

class CmsController extends Controller
{
    public function dash()
    {
        $total_reservations       = Reservation::all()->count();
        $total_reservations_today = Reservation::whereDate('reservation_day', '=', Carbon::today())->count();
        $total_team_members       = Team::all()->count();
        $total_menus              = Menu::all()->count();
        $user                     = User::all();
        $total_retail_menus       = RetailMenu::all()->count();
        $total_categories         = Category::all()->count();
        $nb_people_reserved_tdy   = Reservation::whereDate('reservation_day', '=', Carbon::today())->sum('number_of_person');
        $total_admins             = User::where('usertype' , '=' , 1)->count();

        return view('admin.home' , compact('total_reservations' ,
                                            'total_reservations_today' ,
                                            'total_team_members' ,
                                            'total_menus' ,
                                            'user' ,
                                            'total_retail_menus' ,
                                            'total_categories' ,
                                            'nb_people_reserved_tdy' ,
                                            'total_admins'));
    }
}
