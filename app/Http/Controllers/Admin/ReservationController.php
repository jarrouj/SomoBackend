<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationDeclinedMail;
use App\Mail\ReservationConfirmationMail;
use Carbon\Carbon;


class ReservationController extends Controller
{
    public function show_reservation()
    {
        $reservation = Reservation::latest()->paginate(10);

        return view('admin.reservation.show_reservation', compact('reservation'));
    }



    public function delete_reservation($id)
    {
        $reservation = Reservation::find($id);

        $reservation->delete();

        return redirect()->back()->with('message', 'Reservation Deleted');
    }

    public function update_status(Request $request, $id)
    {
        $reservation = Reservation::find($id);

        if ($reservation->confirmation === null) {
            $reservation->confirmation = $request->conf;
            $reservation->save();

            $message = $request->conf == 1 ? 'Reservation Confirmed' : 'Reservation Canceled';

            if ($request->conf == 1) {
                // Send email confirmation
                Mail::to($reservation->email)->send(new ReservationConfirmationMail($reservation));
            } else {
                Mail::to($reservation->email)->send(new ReservationDeclinedMail($reservation));
            }

            return redirect()->back()->with('message', $message);
        } else {
            return response()->json(['fail' => false, 'message' => 'Confirmation cannot be updated']);
        }
    }


    public function filterReservations(Request $request)
    {
        try {
            $reservations = Reservation::query();

            $filter = $request->filter;

            if ($filter === 'today') {
                $reservations->whereDate('reservation_day', '=', Carbon::today());
            } elseif ($filter === 'tomorrow') {
                $reservations->whereDate('reservation_day', '=', Carbon::tomorrow());
            } elseif ($filter === 'after_a_week') {
                $now = Carbon::now();
                $afterOneWeek = $now->copy()->addWeek();

                $reservations->where('reservation_day', '>', $now)
                    ->where('reservation_day', '<=', $afterOneWeek);
            } elseif ($filter === 'after_a_month') {
                $reservations->where('reservation_day', '>=', Carbon::now())
                    ->where('reservation_day', '<=', Carbon::now()->addMonth());
            } elseif ($filter === 'yesterday') {
                $reservations->whereDate('reservation_day', '=', Carbon::yesterday());
            } elseif ($filter === 'all_reservations') {
                return redirect('/admin/show_reservation');
            } elseif ($filter === 'before_a_week') {
                $reservations->where('reservation_day', '>=', Carbon::now()->subWeek())
                    ->where('reservation_day', '<', Carbon::now());
            }

            // Convert the time to 24-hour format and sort
            $reservations->orderByRaw("TIME_FORMAT(CONVERT(time, TIME), '%H:%i') ASC");

            $reservation = ($filter === 'all_reservations') ? $reservations->get() : $reservations->paginate(10);

            return view('admin.reservation.show_reservation', compact('reservation'));
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to filter reservations', 'error' => $e->getMessage()], 500);
        }
    }
}
