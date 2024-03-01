<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class LoginController extends Controller
{
    /**
     * Show Home page
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Login/Index', []);
    }
    /**
     * Show Home page
     * @return Response
     */
    public function signIn(): Response
    {
        return Inertia::render('Login/SignIn', []);
    }
    /**
     * Show Home page
     * @return Response
     */
    public function signUp(): Response
    {
        return Inertia::render('Login/Register', []);
    }
}
