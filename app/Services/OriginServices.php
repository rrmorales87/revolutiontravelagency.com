<?php

namespace App\Services;

use Illuminate\Http\Request;

class OriginServices
{
    public function create(Request $request)
    {
        return \App\Models\Origins::create($request->all());
    }

    public function update(Request $request)
    {
        return \App\Models\Origins::where("id", $request->id)->update($request->all());
    }

    public function getAll(){
        return \App\Models\Origins::all();
    }
    public function getOne($id)
    {
        return \App\Models\Origins::findOrFail($id);
    }

    public function delete(Request $request)
    {
        return \App\Models\Origins::where("id", $request->id)->delete();
    }
}