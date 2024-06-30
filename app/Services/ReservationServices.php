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
        return $reservation->save();
    }
    public function getAll()
    {
        return Reservations::all();
    }
}
