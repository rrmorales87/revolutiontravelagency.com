<?php

namespace App\Services;

use Illuminate\Http\Request;

class TopDestinations
{
    public function create(Request $request)
    {
        return \App\Models\TopDestinations::create($request->all());
    }
    public function update(Request $request)
    {
        return \App\Models\TopDestinations::where("id", $request->id)->update($request->all());
    }

    public function getAll(){
        return \App\Models\TopDestinations::all();
    }
    public function getOne($id)
    {
        return \App\Models\TopDestinations::findOrFail($id);
    }

    public function delete(Request $request)
    {
        return \App\Models\TopDestinations::where("id", $request->id)->delete();
    }

}