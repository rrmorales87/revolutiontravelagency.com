<?php

namespace App\Services;

use Illuminate\Http\Request;

class TopDestinations
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        return \App\Models\TopDestinations::create($request->all());
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request)
    {
        return \App\Models\TopDestinations::where("id", $request->id)->update($request->all());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(){
        return \App\Models\TopDestinations::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return \App\Models\TopDestinations::findOrFail($id);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function delete(Request $request)
    {
        return \App\Models\TopDestinations::where("id", $request->id)->delete();
    }

    /**
     * @param $title
     * @return TopDestinations
     */
    public function getOneTitle($title)
    {
        $destiny = \App\Models\TopDestinations::where('name',$title)->first();
        if (!$destiny){
            $destiny = new \App\Models\TopDestinations();
            $destiny->name = $title;
            $destiny->photo = 'off';
            $destiny->save();
        }
        return $destiny;
    }

}