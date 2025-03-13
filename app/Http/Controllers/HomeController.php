<?php

namespace App\Http\Controllers;

use App\Http\Resources\OriginsCollections;
use App\Http\Resources\TopDestinationsCollection;
use App\Services\OriginServices;
use App\Services\TopDestinations;
use App\Services\ReservationServices;
use App\Services\UserServices;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    protected UserServices $service;
    protected TopDestinations $serviceDestination;
    protected OriginServices $originServices;
    protected ReservationServices $reservation;

    public function __construct(UserServices $userServices, TopDestinations $serviceDestination, 
    OriginServices $originServices, ReservationServices $reservation)
    {
        $this->service = $userServices;
        $this->serviceDestination = $serviceDestination;
        $this->originServices = $originServices;
        $this->reservation = $reservation;
        
    }

    /**
     * Show Home page
     * @return Response
     */
    public function index(): Response
    {
        $lineChart = $this->reservation->getSerieCountByDate();
        if ($this->service->isAdmin())
            return Inertia::render('Admin/Index', ["chartLine" => $lineChart]);
        $datas = new TopDestinationsCollection($this->serviceDestination->getDestinationWithoutImagen());
        $origins = new OriginsCollections($this->originServices->getAll());
        
        return Inertia::render('Home/Index', ["destinations"=>$datas,"origins"=>$origins, "chartLine" => $lineChart]);
    }
    /**
     * Show Home page
     * @return Response
     */
    public function home(): Response
    {
        $lineChart = $this->reservation->getSerieCountByDate();
        if ($this->service->isAdmin())
            return Inertia::render('Admin/Index', ["chartLine" => $lineChart]);
        $datas = new TopDestinationsCollection($this->serviceDestination->getAll());
        $origins = new OriginsCollections($this->originServices->getAll());
       
        return Inertia::render('Home/home', ["destinations"=>$datas,"origins"=>$origins, "chartLine" => $lineChart]);
    }
}
