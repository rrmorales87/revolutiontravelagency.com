<?php

namespace App\Http\Controllers;


use App\Http\Resources\OriginsCollections;
use App\Http\Resources\OriginsResources;
use App\Http\Resources\ReservationResource;
use App\Http\Resources\ReservationsCollections;
use App\Http\Resources\TopDestinationResource;
use App\Http\Resources\TopDestinationsCollection;
use App\Notifications\ReservationCreated;
use App\Services\OriginServices;
use App\Services\ReservationServices;
use App\Services\TopDestinations;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Inertia\Inertia;
use Inertia\Response;

class ReservationsController extends Controller
{
    protected OriginServices $origin;
    protected TopDestinations $detiny;
    protected ReservationServices $reservation;

    public function __construct(OriginServices $origin, TopDestinations $destiny, ReservationServices $reservation)
    {
        $this->origin = $origin;
        $this->detiny = $destiny;
        $this->reservation = $reservation;
    }

    public function index(Request $request): Response
    {
        $origin = null;
        $destiny = null;
        if ($request->origin)
            $origin = new OriginsResources($this->origin->getOneTitle($request->origin));
        if ($request->destiny)
            $destiny = new TopDestinationResource($this->detiny->getOneTitle($request->destiny));
        $origins = new OriginsCollections($this->origin->getAll());
        $destinations = new TopDestinationsCollection($this->detiny->getAll());
        $reservations = new ReservationsCollections($this->reservation->getByCurrentUser());
        return Inertia::render(
            'Reservations/Index',
            [
                "origin" => $origin,
                "destiny" => $destiny,
                "origins" => $origins,
                "destinations" => $destinations,
                "reservations" => $reservations
            ]
        );
    }

    public function store(Request $request): RedirectResponse
    {

        try {
            $reservation = $this->reservation->create($request);
            $resource = new ReservationResource($reservation);
            Notification::route('mail',$resource->client->contact)
                ->notify(new ReservationCreated($resource));
        } catch (\Error $e) {
            Log::error($e->getMessage());
        }

        return redirect()->route('reservations');
    }

    public function confirm(Request $request): RedirectResponse
    {
        $message = "";

        try {
            $this->reservation->confirmStatus($request->id);
            $message = __('reservations.confirm');
        } catch (\Error $e) {
            Log::error($e->getMessage());
            $message = __('reservations.error_confirm');
        }
        return redirect()->route('reservations');
    }


}
