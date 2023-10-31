<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Product_Trait;
use App\Models\Offer;
use LaravelLocalization;
use App\Http\Requests\offer_details;

class Ajax extends Controller
{

    use Product_Trait;
    
    public function ajax_offer(){
        return view('htmlviews.ajax.create_ajax');
    }

    public function ajax_offer_store(offer_details $result){

   
    
     //$file_name = $this->SaveImageProduct($result->photo,'images/offer_picture');

     // insert data into database

       $offer = Offer::create([
         'name_ar'=>$result->name_ar,
         'name_en'=>$result->name_en,
         'photo'=>$file_name,
         'price'=>$result->price,
         'details_ar'=>$result->details_ar,
         'details_en'=>$result->details_en,
        ]);

        if($offer)
            return response()->json([
              
              'status'=>true,
              'msg'=>__('message_offer.ajax_success'),
            ]);
        else 
            return response()->json([
              'status'=>false,
              'msg'=>__('message_offer.ajax_failed'),

            ]);

    }

    public function ShowOfferDataajax(){

        $offers = Offer::select('id','price','name_'.LaravelLocalization::getCurrentLocale(). ' as OfferName',
      'details_'.LaravelLocalization::getCurrentLocale().' as OfferDetails','photo')->get();
        return view('htmlviews.ajax.offer_data_ajax',compact('offers'));
    }

    public function edit_offer_ajax($offer_ajax_id){

        $offer_ajax = Offer::find($offer_ajax_id);

        if(!$offer_ajax)

            return response()->json([
              'status'=>false,
              'msg'=>'error',

            ]);
            
        $offer_ajax = Offer::select('id','price','name_'.LaravelLocalization::getCurrentLocale(). ' as OfferName',
    'details_'.LaravelLocalization::getCurrentLocale().' as OfferDetails','photo')->find($offer_ajax_id);
     return view('htmlviews.ajax.Offer_Id_Details_ajax',compact('offer_ajax'));

    }

     public function DeletOfferajax(Request $request){
     
     $offers = Offer::find($request->id); // equal offer::where('id','$offer_id')->first();
     if(!$offers)

      return response()->json([
              'status'=>false,
              'msg'=>'هذا العنصر غير موججود',
            ]);


        
     $offers->delete();
     
     return response()->json([
              
              'status'=>true,
              'msg'=>__('message_offer.ajax_success_delete'),
              'id'=>$request->id,
            ]); 
}

 public function ShowUpdate_ajax(Request $request){



    $up_offer = Offer::find($request->offer_id);
     if(!$up_offer)

        return response()->json([
              'status'=>false,
              'msg'=>'هذا العنصر غير موججود',
            ]);

        
     $up_offer = Offer::select('id','name_ar','name_en','price','details_ar','details_en','photo')->find($request->offer_id);
     return view('htmlviews.ajax.update_offer_ajax',compact('up_offer'));

  }
  public function SaveUpdate_ajax(offer_details $request){
    $this->SaveImageOffer($request->photo,'images/offer_picture');
    $up_offer = Offer::find($request->offer_id);// offer_id not exist in the form but it like key that take data by it
    ########## ######### any ajax form send by input type #############
   if(!$up_offer)
      return response()->json([
              'status'=>false,
              'msg'=>'this not found',
            ]);

   $up_offer->update($request->all());
   
    return response()->json([
              
              'status'=>true,
              'msg'=>__('message_offer.ajax_success_update'),
            ]); 

   
    
  }

}
