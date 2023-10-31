<?php

namespace App\Http\Controllers\tester;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class FirstController extends BaseController
{
  public function __construct(){
    //$this->middleware('auth') ->except('getage');
  }

  public function getdata($name,$age){
   
   return "welcome " . $name ." and your age is " . $age;

   }
   public function getname($name){
   
   return "welcome " . $name;

   }
   public function getage($age){
   
   return " your age is " . $age;

   }

    public function getview(){
   
     return view('ahmed');

   }

    /*public function getinfo(){

        $values = [];
        $values['name'] = 'ahmed';
        $values['age'] = 24;
        $values['gender'] = 'male';

        $obj = new \stdClass();
        $obj->name = "ahmed";
        $obj->age = 24;
        $obj->gender = "male";

     return view('ahmed',compact('obj'));
     //return view('ahmed',compact(obj));

   }
   */

   public function getinfo(){
    
   $name = 'ahmed';
   return view('ahmed',compact('name'));


   

   }


}

