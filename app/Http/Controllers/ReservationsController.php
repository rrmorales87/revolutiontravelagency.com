<?php

namespace App\Http\Controllers;


use App\Http\Resources\OriginsResources;
use App\Http\Resources\TopDestinationResource;
use App\Services\OriginServices;
use App\Services\TopDestinations;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ReservationsController extends Controller
{
    protected OriginServices $origin;
    protected TopDestinations $detiny;

    public function __construct(OriginServices $origin, TopDestinations $destiny)
    {
        $this->origin = $origin;
        $this->detiny = $destiny;
    }

    public function index(Request $request): Response
    {
        $origin = null;
        $destiny = null;
        if($request->origin)
            $origin = new OriginsResources($this->origin->getOneTitle($request->origin));
        if($request->destiny)
            $destiny = new TopDestinationResource($this->detiny->getOneTitle($request->destiny));
        return Inertia::render('Reservations/Index', ["origin"=>$origin,"destiny"=>$destiny]);
    }

}
