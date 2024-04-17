<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Services\ContactServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ContactUsController extends Controller
{
    protected $contactService;

    public function __construct(ContactServices $contactService)
    {
        $this->contactService = $contactService;
    }

    /**
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('ContactUs/Index', []);
    }

    public function create(ContactRequest $contact): JsonResponse
    {
        $newContact = $this->contactService->create($contact);
        if($newContact){
            return response()->json(['success' => true, 'message' => __("contact.success_add_contact")]);
        }else {
            return response()->json(['success' => false, 'message' => __("contact.error_add_contact")]);
        }
    }
}
