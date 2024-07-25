<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\OriginsCollections;
use App\Http\Resources\ReservationResource;
use App\Http\Resources\ReservationsCollections;
use App\Http\Resources\TopDestinationsCollection;
use App\Services\OriginServices;
use App\Services\ReservationServices;
use App\Services\TopDestinations;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReservationsController extends Controller
{
    private $reservationService;

    protected OriginServices $origin;
    protected TopDestinations $detiny;

    public function __construct(ReservationServices $reservationService, OriginServices $origin, TopDestinations $detiny)
    {
        $this->reservationService = $reservationService;
        $this->origin = $origin;
        $this->detiny = $detiny;
    }

    public function index()
    {
        $reservations = new ReservationsCollections($this->reservationService->getAll());
        return Inertia::render("Reservations/Admin/Index", ["tableData"=>$reservations]);

    }
    public function confirmReservation($id)
    {
        $reservation = new ReservationResource($this->reservationService->getById($id));
        $origins = new OriginsCollections($this->origin->getAll());
        $destinations = new TopDestinationsCollection($this->detiny->getAll());
        return Inertia::render("Reservations/Admin/ApproveReservation", [
            "reservation"=>$reservation,
            "origins" => $origins,
            "destinations" => $destinations,
        ]);
    }

    public function approveReservation(Request $request)
    {
        try {
           $this->reservationService->approveStatus($request->id,$request->price,$request->time);
            return redirect()->route('reservations.admin.index');
        }catch (\Exception $exception){
            return redirect()->back(['error'=>$exception->getMessage()]);
        }

    }
}
