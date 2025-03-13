<?php

namespace App\Http\Controllers;

use App\Services\ReservationServices;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    
    protected ReservationServices $reservation;

    public function __construct( ReservationServices $reservation){
        $this->reservation = $reservation;
    }
    
    /**
     * Show Home page
     * @return Response
     */
    public function index(): Response
    {
        
        return Inertia::render('Dashboard/Index', ['line'=>$lineChart]);
    }
}
