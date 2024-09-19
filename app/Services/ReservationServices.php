<?php

namespace App\Services;

use App\Models\Clients;
use App\Models\Origins;
use App\Models\Reservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TopDestinations;

class ReservationServices
{
   public function saveReservation(Request $request,Reservations $reservation)
   {
       $client = Clients::where("contact", $request->contact)->first();
       if (!$client) {
           $client = new Clients();
           $client->name = $request->name;
           $client->contact = $request->contact;
           $client->save();
       }

       
       $origin = Origins::where('name', $request->origin)->first();
       if (!$origin) {
           $origin = new Origins();
           $origin->name = $request->origin;
           $origin->photo = 'off';
           $origin->location = '';
           $origin->save();
       }
      
       $destiny = TopDestinations::where('name', $request->destiny)->first();
       
       if (!$destiny) {
           $destiny = new TopDestinations();
           $destiny->name = $request->destiny;  
           $destiny->likes = 0;
           $destiny->price = 0;
           $destiny->photo = "whitout-image.jpg";
           $destiny->save();
       }


       $reservation->price = $request->price ? $request->price : ($destiny->price ? $destiny->price : 1 );
       $reservation->user()->associate(Auth::user());
       $reservation->client()->associate($client);
       $reservation->origin()->associate($origin);
       $reservation->destination()->associate($destiny);
       $reservation->tax = $request->tax ? $request->tax : 1;
       $reservation->status = $request->status;
       $reservation->travellers = $request->travellers;
       $reservation->date = $request->date;
       $reservation->time = $request->time;
       if($request->time_end) $reservation->time_end = $request->time_end;
       if($request->status) $reservation->status = $request->status;
       $reservation->save();
       return $reservation;
   }
    public function create(Request $request)
    {
        $reservation = new Reservations();
        return $this->saveReservation($request, $reservation);
    }

    public function edit(Request $request,$id)
    {
        $reservation = Reservations::where('id',$id)->first();
        return $this->saveReservation($request, $reservation);

    }
    public function getAll()
    {
        return Reservations::all();
    }

    public function getById($id)
    {
        return Reservations::whereId($id)->first();
    }

    public function getByCurrentUser()
    {
        $user = Auth::user();
        $resutl = Reservations::where("user_id", $user->id)->get();
        return $resutl;
    }

    public function confirmStatus($id)
    {
        $reservation = Reservations::where('id', $id)->first();
        $reservation->status = 'confirmed';
        $reservation->save();
        return $reservation;
    }

    public function approveStatus($id,$price,$time)
    {

        $reservation = Reservations::where('id', $id)->first();
        $reservation->status = 'approved';
        $reservation->price = $price;
        $reservation->time_end = $time;
        $reservation->save();
        return $reservation;
    }
    public function canceleStatus($id)
    {

        $reservation = Reservations::where('id', $id)->first();
        $reservation->status = 'canceled';
        $reservation->save();
        return $reservation;
    }
}
