<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ReservationMail;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function add_reservation(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'phone' => 'required|integer',
                'email' => 'required|email',
                'number_of_person' => 'required|integer',
                'reservation_day' => 'required|date|after_or_equal:today',
                // 'time' => 'required|date_format:h:i A'
            ]);

            $reservation = new Reservation;

            $reservation->name             = $validatedData['name'];
            $reservation->phone            = $validatedData['phone'];
            $reservation->email            = $validatedData['email'];
            $reservation->number_of_person = $validatedData['number_of_person'];
            $reservation->comments         = $request->comments;
            $reservation->reservation_day = $validatedData['reservation_day'];
            // $time = date('H:i', strtotime($validatedData['time'])); // Convert to 24-hour format
            $reservation->time = $request->time;

            $reservation->save();

            Mail::to('georgesjarrouj15@gmail.com')->send(new ReservationMail($reservation));

            return response()->json(['message' => 'Reservation Undergoing Process' ,
            'success' => true,
            'redirectUrl' => url()->previous()]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to add reservation' , 'error' => $e->getMessage()], 500);
        }
    }

}
