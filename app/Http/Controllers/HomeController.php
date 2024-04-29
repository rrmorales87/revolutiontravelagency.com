<?php

namespace App\Http\Controllers;

use App\Services\UserServices;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    protected $service;

    public function __construct(UserServices $userServices)
    {
        $this->service = $userServices;
    }

    /**
     * Show Home page
     * @return Response
     */
    public function index(): Response
    {
        if ($this->service->isAdmin())
            return Inertia::render('Admin/Index', []);
        return Inertia::render('Home/Index', []);
    }
    /**
     * Show Home page
     * @return Response
     */
    public function home(): Response
    {
        if ($this->service->isAdmin())
            return Inertia::render('Admin/Index', []);
        return Inertia::render('Home/home', []);
    }
}
