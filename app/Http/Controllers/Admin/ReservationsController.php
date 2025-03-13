<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\OriginsCollections;
use App\Http\Resources\ReservationResource;
use App\Http\Resources\ReservationsCollections;
use App\Http\Resources\TopDestinationsCollection;
use App\Notifications\ReservationCreated;
use App\Notifications\ReservationConfirmt;
use App\Notifications\ReservationCanceled;
use App\Notifications\ReservationApprove;
use App\Services\OriginServices;
use App\Services\ReservationServices;
use App\Services\TopDestinations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
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
            return redirect()->back()->withErrors(['msg'=>$exception->getMessage()]);
        }

    }

    public function newReservation()
    {
        $origins = new OriginsCollections($this->origin->getAll());
        $destinations = new TopDestinationsCollection($this->detiny->getAll());
        return Inertia::render(
            'Reservations/Admin/New',
            [

                "origins" => $origins,
                "destinations" => $destinations,

            ]
        );
    }

    public function storeReservation(Request $request)
    {
        try {
            $reservation = $this->reservationService->create($request);
            $resource = new ReservationResource($reservation);
            switch($resource->status){
                case 'draf': $email = new ReservationCreated($resource);
                break;
                case 'confirmed': $email = new ReservationConfirmt($resource);
                break;
                case 'approved': $email =  new ReservationApprove($resource);
                break;
                case 'canceled': $email = new ReservationCanceled($resource);
                break;
                default: $email = new ReservationCreated($resource);
            }
            Notification::route('mail',$resource->client->contact)
                ->notify($email);
            return redirect()->route('reservations.admin.index');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['msg'=>$exception->getMessage()]);
        }
    }

    public function editReservation($id)
    {
        $origins = new OriginsCollections($this->origin->getAll());
        $destinations = new TopDestinationsCollection($this->detiny->getAll());
        $reservation = new ReservationResource($this->reservationService->getById($id));
        return Inertia::render(
            'Reservations/Admin/Edit',
            [

                "origins" => $origins,
                "destinations" => $destinations,
                "reservation" => $reservation,

            ]
        );
    }
    public function updateReservation(Request $request)
    {
        try {
            $this->reservationService->edit($request,$request->id);
            return redirect()->route('reservations.admin.index');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['msg'=>$exception->getMessage()]);
        }
    }
    public function canceledReservation($id)
    {
        try {
            $this->reservationService->canceleStatus($id);
            return redirect()->route('reservations.admin.index');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['msg'=>$exception->getMessage()]);
        }
    }
}
