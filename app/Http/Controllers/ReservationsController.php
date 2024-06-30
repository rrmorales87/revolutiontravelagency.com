<?php

namespace App\Http\Controllers;


use App\Http\Resources\OriginsCollections;
use App\Http\Resources\OriginsResources;
use App\Http\Resources\ReservationsCollections;
use App\Http\Resources\TopDestinationResource;
use App\Http\Resources\TopDestinationsCollection;
use App\Services\OriginServices;
use App\Services\ReservationServices;
use App\Services\TopDestinations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

        return Inertia::render(
            'Reservations/Index',
            ["origin" => $origin, "destiny" => $destiny, "origins" => $origins, "destinations" => $destinations]
        );
    }

    public function store(Request $request): Response
    {
        try {
            $this->reservation->create($request);
        } catch (\Error $e) {
            Log::error($e->getMessage());
        }
        $reservations = new ReservationsCollections($this->reservation->getAll());
        $origins = new OriginsCollections($this->origin->getAll());
        $destinations = new TopDestinationsCollection($this->detiny->getAll());
        return Inertia::render(
            'Reservations/Index',
            ["origins" => $origins, "destinations" => $destinations, 'reservations' => $reservations]
        );
    }
}
