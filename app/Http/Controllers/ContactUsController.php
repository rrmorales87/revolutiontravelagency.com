<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ContactUsController extends Controller
{
    /**
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('ContactUs/Index', []);
    }
}
