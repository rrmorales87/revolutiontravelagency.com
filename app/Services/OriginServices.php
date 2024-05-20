<?php

namespace App\Services;

use Illuminate\Http\Request;

class OriginServices
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        return \App\Models\Origins::create($request->all());
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request)
    {
        return \App\Models\Origins::where("id", $request->id)->update($request->all());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(){
        return \App\Models\Origins::all();
    }

    /**
     * Funcion para buscar por el nombre si no se encuentra se crea
     * @param $title
     * @return mixed
     */
    public function getOneTitle($title)
    {
        $origin = \App\Models\Origins::where('name',$title)->first();
        if (!$origin){
            $origin = new \App\Models\Origins();
            $origin->name = $title;
            $origin->photo = 'off';
            $origin->save();
        }
       return $origin;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return \App\Models\Origins::findOrFail($id);
    }

    public function delete(Request $request)
    {
        return \App\Models\Origins::where("id", $request->id)->delete();
    }
}