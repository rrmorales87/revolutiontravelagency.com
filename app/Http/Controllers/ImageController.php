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
    public function store(Request $request): RedirectResponse
    {
        dd($request);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);


        return back()
            ->with('success', 'You have successfully upload image.')
            ->with('image', $imageName);
    }
}
