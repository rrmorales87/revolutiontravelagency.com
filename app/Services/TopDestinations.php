<?php

namespace App\Services;

use Illuminate\Http\Request;

class TopDestinations
{
    public function create(Request $request)
    {
        return \App\Models\TopDestinations::create($request->all());
    }

    public function getAll(){
        return \App\Models\TopDestinations::all();
    }

}