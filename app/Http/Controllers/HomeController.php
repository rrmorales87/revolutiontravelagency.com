<?php

namespace App\Http\Controllers;

use App\Http\Resources\OriginsCollections;
use App\Http\Resources\TopDestinationsCollection;
use App\Services\OriginServices;
use App\Services\TopDestinations;
use App\Services\UserServices;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    protected UserServices $service;
    protected TopDestinations $serviceDestination;
    protected OriginServices $originServices;

    public function __construct(UserServices $userServices, TopDestinations $serviceDestination, OriginServices $originServices)
    {
        $this->service = $userServices;
        $this->serviceDestination = $serviceDestination;
        $this->originServices = $originServices;
    }

    /**
     * Show Home page
     * @return Response
     */
    public function index(): Response
    {
        if ($this->service->isAdmin())
            return Inertia::render('Admin/Index', []);
        $datas = new TopDestinationsCollection($this->serviceDestination->getAll());
        $origins = new OriginsCollections($this->originServices->getAll());
        return Inertia::render('Home/Index', ["destinations"=>$datas,"origins"=>$origins]);
    }
    /**
     * Show Home page
     * @return Response
     */
    public function home(): Response
    {
        if ($this->service->isAdmin())
            return Inertia::render('Admin/Index', []);
        $datas = new TopDestinationsCollection($this->serviceDestination->getAll());
        $origins = new OriginsCollections($this->originServices->getAll());
        return Inertia::render('Home/home', ["destinations"=>$datas,"origins"=>$origins]);
    }
}
