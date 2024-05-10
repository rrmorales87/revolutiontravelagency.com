<?php

namespace App\Http\Controllers;

use App\Http\Resources\TopDestinationsCollection;
use App\Services\TopDestinations;
use App\Services\UserServices;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    protected UserServices $service;
    protected TopDestinations $serviceDestination;

    public function __construct(UserServices $userServices, TopDestinations $serviceDestination)
    {
        $this->service = $userServices;
        $this->serviceDestination = $serviceDestination;
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
        return Inertia::render('Home/Index', ["destinations"=>$datas]);
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
        return Inertia::render('Home/home', ["destinations"=>$datas]);
    }
}
