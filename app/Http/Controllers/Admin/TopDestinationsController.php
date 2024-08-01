<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\TopDestinationResource;
use App\Http\Resources\TopDestinationsCollection;
use App\Services\TopDestinations;
use Illuminate\Http\RedirectResponse;
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
                return Inertia::render('TopDestinations/New', ["success"=>false,"message"=>__('destinations.error_add')]);
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return Inertia::render('TopDestinations/New', ["success"=>false,"message"=>__('destinations.error_add')]);

        }

    }
    public function update(Request $request): Response
    {
        try {
            if($this->service->update($request)){
                $datas = new TopDestinationsCollection($this->service->getAll());
                return Inertia::render('TopDestinations/Index', ["tableData"=>$datas]);
            }
            else
                return Inertia::render('TopDestinations/Edit', ["success"=>false,"message"=>__('destinations.error_update')]);
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return Inertia::render('TopDestinations/Edit', ["success"=>false,"message"=>__('destinations.error_update')]);

        }

    }

    public function edit(Request $request):Response
    {
        $model = $this->service->getOne($request->id);
        $result = new TopDestinationResource($model);
        return Inertia::render("TopDestinations/Edit",["destination"=>$result]);

    }

    public function remove(Request $request):RedirectResponse
    {
        $datas = new TopDestinationsCollection($this->service->getAll());
        try {
            if ($this->service->delete($request)){
                return back()->with(["seccess"=>false,"message"=>__('destination.success_delete')]);
            }else{
                return back()->with(["seccess"=>false,"message"=>__('destination.error_delete')]);
            }





        } catch (\Exception $exception)
        {
            Log::error($exception);


            return back()->with(["seccess"=>false,"message"=>__('destination.error_delete')]);

        }


    }

    public function addLike($id):RedirectResponse
    {

        try {
           $this->service->addLike($id);
           return back();

        } catch (\Exception $exception)
        {
            Log::error($exception);


            return back()->with(["seccess"=>false,"message"=>__('destination.error_delete')]);

        }


    }


}
