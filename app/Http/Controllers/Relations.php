<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Country;
use App\Models\Service;
use App\Models\Hospital;
use Illuminate\Support\Facades\Validator;


class Relations extends Controller
{
    public function getuser(){

  
  // $phone = Phone::find(1);

   /*$user = User::with(['Phone'=>function($q){
   
   $q ->select('code','phone','user_id');
      
   }])->find(5);

   return $user;
   */

   //return $user = User::with('phone')->find(5);

//return response()->json($user);


######################### this is return all user has phone code is 02##################
  /* $user = User::whereHas('Phone',function($q){
    $q ->where('code','02');
   })->get();
   return $user;
   */

  $user = User::with(['Phone'=>function($q){
   
   $q ->select('code','phone','user_id');
      
   }])->get();

  

   return view('Relations.RE',compact('user'));  

    /*$phone = Phone::with(['user'=>function($q){
    
    $q ->select('name','email');

    }])->find(1);

    return $phone;
    */
}


    ############################### one to many relation ####################33

   public function hasrelation(){

    $hos = Hospital::find(1);
      return $hos->doctors;





   // $hos = Hospital::with('doctors')->find(1);
    //return $hos->name;

   // $hospital = $hos->doctors; 
}

public function getHosData(){

    $hospitals = Hospital::select('id','name','address')->get();

    return view('Relations.hopsital',compact('hospitals'));
}

public function showddata($hospital_id){

  $hospital = Hospital::find($hospital_id);
  if(!$hospital)
    return abort('404');

  $doctors = $hospital->doctors;

  return view('Relations.doctor',compact('doctors'));

}

public function editdoctor($doctor_id){
   
   $doctor = Doctor::find($doctor_id);

   if(!$doctor)
     return abort('404');

 $doct = Doctor::select('id','name','title')->find($doctor_id);

 return view('Relations.doctor_data',compact('doct'));
}

public function deletedoctor($doctor_id){

 $doctor = Doctor::find($doctor_id);

   if(!$doctor)
     return redirect()->back()->with(['error'=>'not fonnd']);

 $doctor->delete();

 return redirect()->route('edit',$doctor->id)->with(['delete'=>__('message_offer.deleted')]);
}


public function getcontain(){

   // return Hospital::whereHas('doctors')->get(); // hosiptal has doctors only

    /*return Hospital::whereHas('doctors',function($q){
      
      $q ->where('gender',1);  // get hospital that has doctors male only

    })->get();
    */
   return Hospital::with('doctors')->whereHas('doctors',function($q){
      
      $q ->where('gender',1);  // get hospital that has doctors male only and show doctors

    })->get();
}

public function get_doctor_service(){
    
     //$doctor = Doctor::find(5);
     //return $doctor->services;

    return $doctor = Doctor::with('services')->find(9);

}

public function get_service_doctor(){
  return  $doctor = Service::with(['doctors'=>function($q){

    $q->select('doctors.id','name','title');

    }])->find(1);
}

public function getServiceDoctor($doctor_id){



  $doctor = Doctor::find($doctor_id);
  $Services = $doctor->services;

 if(!$Services)
    return abort('404');

  $doctors = Doctor::select('id','name')->get();
  $service = Service::select('id','name')->get();

  return view('Relations.service_doctor',compact('Services','doctors','service'));
}

public function saveServiceDoctor(Request $request) {
    $doctor = Doctor::find($request->doctors_id);
    
    if(!$doctor)
        return abort('404');

    //$doctor->services()->attach($request->Services_id); add data to database and manage how to save array

   // $doctor->services()->sync($request->Services_id); 

   ## if the same data exist [not add] same data but 
    ##if not exist make [update to data ] and make new data that you entereded it

    $doctor->services()->syncWithoutDetaching($request->Services_id);

     ## if the same data exist [not add] same data but 
    ##if not exist  [not update to data ] and add this data to the old data
 

    return redirect()->route('get_service',$doctor->id);
}

public function getdoctorpatient(){
    $patient = Patient::find(4);
     return $patient->doctor;
}

public function getcountrydoctor(){
 //return  $contry = Country::with('doctors')->find(1);

   // return $contry->doctors;

    return $contry = Country::with(['hospitals','doctors'])->find(1);
}

}
