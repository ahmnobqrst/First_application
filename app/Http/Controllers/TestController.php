<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Doctor;
use App\Http\Requests\offer_details;
use App\Traits\OfferTrait;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use LaravelLocalization;

class TestController extends Controller
{

    use OfferTrait;

    public function getinfo(){
        
        return Offer::get();
    }

    /*public function store(){

        Offer::create([

          'name'=>'offer3',
          'price'=>300,
          'details'=>'offer details'
        ]);
    }*/

    public function create(){
        return view('htmlviews.create');
    }
    public function store(offer_details $result){
     
     //validate data before insert this data into database
     
    $file_name = $this->SaveImage($result->photo,'images/offer_picture');

     // insert data into database

        Offer::create([
         'name_ar'=>$result->name_ar,
         'name_en'=>$result->name_en,
         'photo'=>$file_name,
         'price'=>$result->price,
         'details_ar'=>$result->details_ar,
         'details_en'=>$result->details_en,
        ]);

        return redirect()->back()->with(['success'=>__('message_offer.result')]);
    }

    public function ShowOfferData(){

        $offers = Offer::select('id','price','name_'.LaravelLocalization::getCurrentLocale(). ' as OfferName',
      'details_'.LaravelLocalization::getCurrentLocale().' as OfferDetails','photo')->get();
        return view('htmlviews.offer_data',compact('offers'));
    }

   // edit elements from tha database

    public function EditOffer($offer_id){
    //$offers = findorfail($odder_id);
     $offers = Offer::find($offer_id);
     if(!$offers)
        return redirect()->back();
     $offers = Offer::select('id','price','name_'.LaravelLocalization::getCurrentLocale(). ' as OfferName',
    'details_'.LaravelLocalization::getCurrentLocale().' as OfferDetails','photo')->find($offer_id);
     return view('htmlviews.reports.Offer_Id_Details',compact('offers'));

    }
    public function DeletOffer($offer_id){
     
     $offers = Offer::find($offer_id); // equal offer::where('id','$offer_id')->first();
     if(!$offers)
        return redirect()->back()->with(['error'=>__('message_offer.error')]);
     
     $offers->delete();
     return redirect()->route('show')->with(['delete'=>__('message_offer.deleted')]);

    }

  public function ShowUpdate($update_id){

    // Offer::findorfail($update_id);

    $up_offer = Offer::find($update_id);
     if(!$up_offer)
        return redirect()->back();
     $up_offer = Offer::select('id','name_ar','name_en','price','details_ar','details_en','photo')->find($update_id);
     return view('htmlviews.update_offer',compact('up_offer'));

  }

  public function SaveUpdate(offer_details $result,$up_id){
  
     //$this->SaveImage($result->photo,'images/offer_picture');

 // $this->saveupdateimage($result->photo,'images/offer_picture');
    
    $up_offer = Offer::find($up_id);// find function search by id only
   if(!$up_offer)
      return redirect()->back();

   $up_offer->update($result->all());
   return redirect()->back()->with(['stored'=>__('message_offer.results')]);
    
  }

 


   /* protected function getrules(){
       return $rules = [
          
          'name_ar'=>'required|max:100|unique:offers,name_ar',
          'name_en'=>'required|max:100|unique:offers,name_en',
          'price'=>'required|numeric',
          'details_ar'=>'required',
          'details_en'=>'required',
        ];
    }

    protected function getmessage(){
        return $message = [
          
          'name_ar.unique' => 'هذا العرض وجود مسبثا',
          'name_ar.required' => 'تفاصيل العرض مطلوب',
          'name_ar.max' => 'يجب ان يموت الاسم 100',
          'name_en.unique' => 'يجب ان يكون الاسم الانجليزي لا يتكرر',
          'name_en.required' => 'الاسم الانجليزي مطلوب',
          'name_en.max' => 'يجب ان يكون طول الاسم طوله 100',
          'price.numeric' => 'يجب ان يكون السعر رقما',
          'price.required' => 'السعر مطلوب',
          'details_ar.required' => 'التفاصيل مطلوبه',
          'details_en.required' => 'التفاصيل بالانجليزي مطلوب',
        ];
    }
    */
}
