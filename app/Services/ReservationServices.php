<?php

namespace App\Services;

use App\Models\Clients;
use App\Models\Origins;
use App\Models\Reservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationServices
{
    public function create(Request $request)
    {
        $reservation = new Reservations();
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
        $destiny = \App\Models\TopDestinations::where('name', $request->destiny)->first();
        if (!$destiny) {
            $destiny = new \App\Models\TopDestinations();
            $destiny->name = $request->destiny;
            $destiny->save();
        }


        $reservation->price = $destiny->price;
        $reservation->user()->associate(Auth::user());
        $reservation->client()->associate($client);
        $reservation->origin()->associate($origin);
        $reservation->destination()->associate($destiny);
        $reservation->tax = 1;
        $reservation->status = $request->status;
        $reservation->travellers = $request->travellers;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        return $reservation->save();
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
}
