<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\OriginsCollections;
use App\Http\Resources\OriginsResources;
use App\Http\Resources\TopDestinationsCollection;
use App\Services\OriginServices;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;

class OriginsController extends Controller
{
    protected OriginServices $service;

    public function __construct(OriginServices $service)
    {
        $this->service = $service;
    }

    public function index(): Response
    {
        $datas = new OriginsCollections($this->service->getAll());
        return Inertia::render('Origins/Index', ["tableData"=>$datas]);
    }

    public function create(): Response
    {
        return Inertia::render('Origins/New', []);
    }

    public function store(Request $request): Response
    {
        try {

            if($this->service->create($request)){
                $datas = new OriginsCollections($this->service->getAll());

                return Inertia::render('Origins/Index', ["tableData"=>$datas]);
            }
            else
                return Inertia::render('Origins/New', ["success"=>false,"message"=>__('origins.error_add')]);
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return Inertia::render('Origins/New', ["success"=>false,"message"=>__('origins.error_add')]);

        }

    }

    public function update(Request $request): Response
    {
        try {
            if($this->service->update($request)){
                $datas = new OriginsCollections($this->service->getAll());
                return Inertia::render('Origins/Index', ["tableData"=>$datas]);
            }
            else
                return Inertia::render('Origins/Index', ["success"=>false,"message"=>__('origins.error_update')]);
        }catch (\Exception $exception)
        {
            Log::error($exception);
            return Inertia::render('Origins/Index', ["success"=>false,"message"=>__('origins.error_update')]);

        }

    }

    public function edit(Request $request):Response
    {
        $model = $this->service->getOne($request->id);
        $result = new OriginsResources($model);
        return Inertia::render("Origins/Edit",["origins"=>$result]);

    }

    public function remove(Request $request):RedirectResponse
    {
        $datas = new OriginsCollections($this->service->getAll());
        try {
            if ($this->service->delete($request)){
                return back()->with(["seccess"=>false,"message"=>__('origins.success_delete')]);
            }else{
                return back()->with(["seccess"=>false,"message"=>__('origins.error_delete')]);
            }





        } catch (\Exception $exception)
        {
            Log::error($exception);


            return back()->with(["seccess"=>false,"message"=>__('origins.error_delete')]);

        }


    }




}
