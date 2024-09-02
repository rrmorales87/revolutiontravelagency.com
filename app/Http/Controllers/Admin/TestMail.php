<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReservationResource;
use App\Services\ReservationServices;
use Illuminate\Http\Request;

class TestMail extends Controller
{
    private ReservationServices $service;

    public function __construct(ReservationServices $service){
        $this->service = $service;
    }
    //
    public function index()
    {
        $resources = $this->service->getById(1000000);
        if ( isset($resources->client))
            return view('emails.request',['reservation' => $resources]);
    }
}
