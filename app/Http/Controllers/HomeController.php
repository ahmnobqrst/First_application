<?php

namespace App\Http\Controllers;
use App\Models\video;
use App\Events\watch;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Doctor;
use App\Scopes\OfferScope;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getvideo(){
      $vid = Video::first();
      event(new Watch($vid)); // fire event
      return view('htmlviews.reports.Events',compact('vid'));
    }

    public function getscope(){
        return Offer::invalid()->get();
    }

    public function getscopeactive(){
        //return Offer::get(); //there are global scope

       #############3 remove global scope #########

       //return  Offer::withoutGlobalScope(OfferScope::class)->get();
    }

    public function getaccessor(){
        return $doctors = Doctor::select('id','name','gender')->get();

        /*foreach($doctors as $doctor){
            $doctor ->gender = $doctor ->gender == 1 ?'male':'female';
        }

        return $doctors;
    }
    */
    }

    public function getaccessor1(){

        //Offer::withoutGlobalScope(OfferScope::class)->get();
        return $offers = Offer::select('id','name_en','status')->get(); // there are accessors in this model
    }

    
   
}
