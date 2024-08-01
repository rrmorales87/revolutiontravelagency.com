<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactCollection;
use App\Services\ContactServices;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    //
    private ContactServices $contactService;

    public function __construct(ContactServices $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index(){
        $resource = new ContactCollection($this->contactService->getAll());
        return Inertia::render('ContactUs/Admin/Index', ['tableData' => $resource]);
    }
}
