<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\WwdController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ShowController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\LandingController;
use App\Http\Controllers\Admin\MissionController;
use App\Http\Controllers\Admin\OpeningController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\LocCatController;
use App\Http\Controllers\Admin\RetailMenuController;
use App\Http\Controllers\Admin\ReservationController;

Route::redirect('/', '/login');
Route::post('/register', [AuthController::class , 'register'])->name('register');




Route::prefix('/admin')->middleware([ 'auth' ,'AuthMiddleware' , 'trackOnline'])->group(function ()
{
      Route::get('/', [CmsController::class, 'dash']);

      // {{ User }}
      Route::get('/show_user'                , [UserController::class, 'show_user']);
      Route::get('/update_user/{id}'         , [UserController::class, 'update_user']);
      Route::post('/update_user_confirm/{id}', [UserController::class, 'update_user_confirm']);
      Route::get('/delete_user/{id}'         , [UserController::class, 'delete_user']);

      // {{ Landing }}
      Route::get('/show_landing'         , [LandingController::class , 'show_landing']);
      Route::post('/add_landing'         , [LandingController::class , 'add_landing']);
      Route::post('/update_landing/{id}' , [LandingController::class , 'update_landing']);
      Route::get('/delete_landing/{id}'  , [LandingController::class , 'delete_landing']);

     // {{ Category }}
     Route::get('/show_category'         , [CategoryController::class , 'show_category']);
     Route::post('/add_category'         , [CategoryController::class , 'add_category']);
     Route::post('/update_category/{id}' , [CategoryController::class , 'update_category']);
     Route::get('/delete_category/{id}'  , [CategoryController::class , 'delete_category']);


      // {{ Mission }}
      Route::get('/show_mission'         , [MissionController::class , 'show_mission']);
      Route::post('/add_mission'         , [MissionController::class , 'add_mission']);
      Route::post('/update_mission/{id}' , [MissionController::class , 'update_mission']);
      Route::get('/delete_mission/{id}'  , [MissionController::class , 'delete_mission']);

       // {{ Opening }}
       Route::get('/show_opening'         , [OpeningController::class , 'show_opening']);
       Route::post('/add_opening'         , [OpeningController::class , 'add_opening']);
       Route::post('/update_opening/{id}' , [OpeningController::class , 'update_opening']);
       Route::get('/delete_opening/{id}'  , [OpeningController::class , 'delete_opening']);


       // {{ Social }}
       Route::get('/show_social'                ,[SocialController::class,'show_social']);
       Route::post('/update_social_confirm/{id}',[SocialController::class,'update_social_confirm']);
       Route::get('/update_social/{id}'         ,[SocialController::class,'update_social']);


        // {{ Gallery }}
        Route::get('/show_gallery'         , [GalleryController::class , 'show_gallery']);
        Route::post('/add_gallery'         , [GalleryController::class , 'add_gallery']);
        Route::get('/delete_gallery/{id}'  , [GalleryController::class , 'delete_gallery']);

        // {{ Team }}
        Route::get('/show_team'         , [TeamController::class , 'show_team']);
        Route::post('/add_team'         , [TeamController::class , 'add_team']);
        Route::post('/update_team/{id}' , [TeamController::class , 'update_team']);
        Route::get('/delete_team/{id}'  , [TeamController::class , 'delete_team']);

        // {{ Wwd }}
        Route::get('/show_wwd'         , [WwdController::class , 'show_wwd']);
        Route::post('/add_wwd'         , [WwdController::class , 'add_wwd']);
        Route::post('/update_wwd/{id}' , [WwdController::class , 'update_wwd']);
        Route::get('/delete_wwd/{id}'  , [WwdController::class , 'delete_wwd']);

         // {{ Blog }}
        Route::get('/show_blog'         , [BlogController::class , 'show_blog']);
        Route::post('/add_blog'         , [BlogController::class , 'add_blog']);
        Route::post('/update_blog/{id}' , [BlogController::class , 'update_blog']);
        Route::get('/delete_blog/{id}'  , [BlogController::class , 'delete_blog']);

         // {{ Menu }}
        Route::get('/show_menu'         , [MenuController::class , 'show_menu']);
        Route::post('/add_menu'         , [MenuController::class , 'add_menu']);
        Route::post('/update_menu/{id}' , [MenuController::class , 'update_menu']);
        Route::get('/delete_menu/{id}'  , [MenuController::class , 'delete_menu']);

         // {{ Retail Menu }}
        Route::get('/show_retail_menu'         , [RetailMenuController::class , 'show_retail_menu']);
        Route::post('/add_retail_menu'         , [RetailMenuController::class , 'add_retail_menu']);
        Route::post('/update_retail_menu/{id}' , [RetailMenuController::class , 'update_retail_menu']);
        Route::get('/delete_retail_menu/{id}'  , [RetailMenuController::class , 'delete_retail_menu']);

        // {{ Location }}
        Route::get('/show_location'         , [LocationController::class , 'show_location']);
        Route::post('/add_location'         , [LocationController::class , 'add_location']);
        Route::post('/update_location/{id}' , [LocationController::class , 'update_location']);
        Route::get('/delete_location/{id}'  , [LocationController::class , 'delete_location']);


        // {{ Reservation }}
        Route::get('/show_reservation'                , [ReservationController::class , 'show_reservation']);
        Route::get('/update_reservation/{id}'         , [ReservationController::class , 'update_reservation']);
        Route::post('/update_reservation_confirm/{id}', [ReservationController::class , 'update_reservation_confirm']);
        Route::get('/delete_reservation/{id}'         , [ReservationController::class , 'delete_reservation']);
        Route::post('/update-status/{id}'             ,[ReservationController::class,'update_status'])->name('update-status');
        Route::get('/filter_reservation'             ,[ReservationController::class,'filterReservations']);

        // {{ About }}
        Route::get('/show_about'          , [AboutController::class , 'show_about']);
        Route::post('/update_about/{id}'  , [AboutController::class , 'update_about']);


        // {{ Show }}
        Route::post('/team',[ShowController::class,'team']);
        Route::post('/mission',[ShowController::class,'mission']);
        Route::post('/about',[ShowController::class,'about']);
        Route::post('/wwd',[ShowController::class,'wwd']);
        Route::post('/blog',[ShowController::class,'blog']);
        Route::post('/opening',[ShowController::class,'opening']);
        Route::post('/menu',[ShowController::class,'menu']);
        Route::post('/retail_menu',[ShowController::class,'retail_menu']);

        // {{ Search }}
        Route::get('/search_menu', [MenuController::class,'search_menu']);
        Route::get('/search_retail_menu', [RetailMenuController::class,'search_retail_menu']);
        Route::get('/search_category', [CategoryController::class,'search_category']);

        // {{ Category Location }}
        Route::get('/show_category_location', [LocCatController::class , 'show_loc_cat']);
        Route::post('/add_loc_cat'         , [LocCatController::class , 'add_loc_cat']);
        Route::post('/update_loc_cat/{id}' , [LocCatController::class , 'update_loc_cat']);
        Route::get('/delete_loc_cat/{id}'  , [LocCatController::class , 'delete_loc_cat']);

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/admin');
    })->name('dashboard');
});
