<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function store(Request $request): bool
    {

        if($request->has('file')){

            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $imageName = time() . '.' . $extension;
            print_r($imageName);
            $file->move(public_path('images'), $imageName);
            return true;
        }
        return false;
    }
}
