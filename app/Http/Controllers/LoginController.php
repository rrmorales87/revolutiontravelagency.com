<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Services\UserServices;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class LoginController extends Controller
{
    protected $user;

    public function __construct(UserServices $service)
    {
        $this->user = $service;

    }

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

    /**
     * RegisterAction
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function registerAction(UserRequest $request):RedirectResponse
    {
          if(!$this->user->register($request)){
              return Redirect::route('signUp')
                  ->with('error', __('http-statuses.406'));
          }

        if($this->user->authenticate($request)){
            $request->session()->regenerate();
            return Redirect::route('home');
        }

        return Redirect::back();
    }

    public function signInAction(Request $request):RedirectResponse
    {
        if (!$this->user->authenticate($request)){
            return Redirect::route('signIn')
                ->withErrors( __('auth.failed'));
        }
        $request->session()->regenerate();
        return Redirect::route("home");
    }


}
