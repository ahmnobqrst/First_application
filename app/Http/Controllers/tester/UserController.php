<?php

namespace App\Http\Controllers\tester;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{

    public function getview() {

     return "ahmed gaber";

    }


    public function deleteuser() {

     return "you are delete user from website";

    }

    public function operationmethod() {

     return view('welcome') ;

    }
    
}
