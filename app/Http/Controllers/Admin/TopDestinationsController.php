<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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

    public function store(Request $request): JsonResponse
    {

    }


}
