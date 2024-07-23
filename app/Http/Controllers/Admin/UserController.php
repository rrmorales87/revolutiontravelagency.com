<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Services\UserServices;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    private $services;

    public function __construct(UserServices $services){
        $this->services = $services;
    }

    public function index(){
        $datas = new UserCollection($this->services->getAllUsers());
        return Inertia::render('Users/Index', ["tableData"=>$datas]);
    }

    public function changeRole(Request $request)
    {
        $this->services->changeRole($request);
        return back();
    }
}
