<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{
    public function index(){
        $events = array();
        $timings = Booking::orderBy("start_date", "asc")->limit(6)->get();

        $bookings = Booking::all();
        foreach($bookings as $booking){
            $color = '#ffebcd';
            if($booking->title == 'Test'){
                $color = '#ffe4c4';
            }
            $events[]= [
                'id' => $booking->id,
                'title' => $booking->title,
                'start' => $booking->start_date,
                'end' => $booking->end_date,
                'color' => $color,
                'start_range' => $booking->start_range,
                'end_range' => $booking->end_range,
                'desc' => $booking->desc,
            ];
        }

        return view('frontend.index', ['events' => $events, 'timings' => $timings]);
    }
    public function storeEvent(Request $request)
    {
        $request->validate([
            'title' => 'required|string'
        ]);

        $booking = Booking::create([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'start_range' => $request->start_range,
            'end_range' => $request->end_range,
            'desc' => $request->desc,
        ]);

        $color = '#ffebcd';

        if($booking->title == 'Test') {
            $color = '#924ACE';
        }

        return response()->json([
            'id' => $booking->id,
            'start' => $booking->start_date,
            'end' => $booking->end_date,
            'title' => $booking->title,
            'color' => $color ? $color: '',

        ]);
    }
    public function updateEvent(Request $request ,$id)
    {
        $booking = Booking::find($id);
        if(! $booking){
            return response()->json([
                'error' => 'unable to locate the event'
            ], 404);
        }
        $booking->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return response()->json('Event updated');
    }
    public function deleteEvent($id)
    {
        $booking = Booking::find($id);
        if(! $booking){
            return response()->json([
                'error' => 'unable to locate the event'
            ], 404);
        }
        $booking->delete();
        return $id;
    }
    public function allEvent()
    {
        $events = Booking::orderBy("start_date", "asc")->paginate(10);
        return view('frontend.event-all',compact('events'));
    }
    public function detailEvent($id)
    {
        $event = Booking::findOrFail($id);
        return view('frontend.event-detail',compact('event'));
    }
}
