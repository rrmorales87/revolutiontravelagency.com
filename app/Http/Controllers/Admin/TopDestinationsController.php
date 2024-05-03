<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class TopDestinationsController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('TopDestinations/Index', []);
    }

    public function create(): Response
    {
        return Inertia::render('TopDestinations/New', []);
    }


}
