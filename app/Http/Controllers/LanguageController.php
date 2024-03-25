<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function index(Request $request):void
    {
       App::setLocale($request->locale);
       session()->put('locale', $request->locale);
    }
}
