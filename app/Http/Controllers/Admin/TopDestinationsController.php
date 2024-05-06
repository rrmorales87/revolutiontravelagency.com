<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\TopDestinationResource;
use App\Http\Resources\TopDestinationsCollection;
use App\Services\TopDestinations;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;

class TopDestinationsController extends Controller
{
    protected  $service;

    public function __construct(TopDestinations $service)
    {
        $this->service = $service;
    }

    public function index(): Response
    {
        $datas = new TopDestinationsCollection($this->service->getAll());
        return Inertia::render('TopDestinations/Index', ["tableData"=>$datas]);
    }

    public function create(): Response
    {
        return Inertia::render('TopDestinations/New', []);
    }

    public function store(Request $request): Response
    {
        try {
            if($this->service->create($request)){
                $datas = new TopDestinationsCollection($this->service->getAll());
                return Inertia::render('TopDestinations/Index', ["tableData"=>$datas]);
            }
            else
                return Inertia::render('TopDestinations/New', compact(["success"=>true,"message"=>__('destinations.error_add')]));
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return Inertia::render('TopDestinations/New', compact($exception));

        }

    }


}
