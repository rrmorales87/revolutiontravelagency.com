<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReservationsCollections;
use App\Services\ReservationServices;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReservationsController extends Controller
{
    private $reservationService;

    public function __construct(ReservationServices $reservationService)
    {
        $this->reservationService = $reservationService;
    }

    public function index()
    {
        $reservations = new ReservationsCollections($this->reservationService->getAll());
        return Inertia::render("Reservations/Admin/Index", ["tableData"=>$reservations]);

    }
    public function confirmReservation(Request $request)
    {

    }
}
