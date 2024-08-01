<?php

namespace App\Services;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactServices
{
    public function create(ContactRequest $data)
    {
        $concat = new Contact($data->all());
        return $concat->save();
    }

    public function getAll()
    {
        return Contact::all();
    }

}