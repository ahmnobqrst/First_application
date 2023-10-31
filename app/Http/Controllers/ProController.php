<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Offer;
use App\Http\Requests\OfferRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use LaravelLocalization;

class ProController extends Controller
{
   public function getinfo(){
    return view('htmlviews.product');
   }

   public function addproduct(OfferRequest $pro){

     

   /*$rules = [

    'p_name'=>'required|unique:products,p_name',
    'p_description'=>'required|max:200',
    'p_price'=>'numeric|required',
   ];
   */

   /* $message = [

    'p_name.required'=>__('message.offer name required'),
    //'p_name'=>'يجب ان يكون اسم المنتح نص',
    'p_name.unique'=>__('message.offer name unique'),
    'p_description.required'=>__('message.offer description required'),
    'p_price.required'=>__('message.offer price required'),
    'p_price.numeric'=>__('message.offer price numeric'),
   ];
   */

   /*'p_name.required'=>'اسم المنتج مطلوب',
    //'p_name'=>'يجب ان يكون اسم المنتح نص',
    'p_name.unique'=>'هذا الاسم موجود مسبقا',
    'p_description.required'=>'الوصف مطلوب',
    'p_price.required'=>'السعر كطلوب',
    'p_price.numeric'=>'يجب ان يكون السعر رقم',
    */

   /* $validate = validator::make($pro->all(),$rules,$message);

    if($validate->fails()){
            //return $validate->errors()->first();
            return redirect()->back()->witherrors($validate)->withinputs($pro->all());
    }
    */

    Product::create([
    
    'name_ar'=> $pro->name_ar,
    'name_en'=> $pro->name_en,
    'p_price'=> $pro->p_price,
    'desc_ar'=> $pro->desc_ar,
    'desc_en'=> $pro->desc_en,
     ]);

    //return ($pro->all());

    return redirect()->back()->with(['stored'=>__('message.result')]);
   


  
}

  public function getdata(){
   $offers = Product::select('id','p_price','name_'.LaravelLocalization::getCurrentLocale(). ' as name',
      'desc_'.LaravelLocalization::getCurrentLocale().' as desc')->get();
   return view('htmlviews.result',compact('offers'));
  }



  public function EditProduct($offer_id){
   //product::findorfail($data_id);  //check if exists or no
   $offer = Product::find($offer_id); // find function search by id only
   if(!$offer)
      return redirect()->back();

   $offer = Product::select('id','name_ar','name_en','p_price','desc_ar','desc_en')->find($offer_id);
   return view('htmlviews.update',compact('offer'));
  }



  public function UpdateProduct(OfferRequest $pro,$offer_id){

   //$product = Product::find($data_id);
   $offer = Product::find($offer_id);// find function search by id only
   if(!$offer)
      return redirect()->back();

   $product->update($pro->all());
   return redirect()->back()->with(['stored'=>__('message.result')]);

  }


   public function adult(){
        return view('middviews.create');
    }
     public function site(){
        return view('site');
    }
     public function admin(){
        return view('admin');
    }

    public function getwithpaginate(){

      $offers = Offer::select('id','price','name_'.LaravelLocalization::getCurrentLocale(). ' as OfferName',
      'details_'.LaravelLocalization::getCurrentLocale().' as OfferDetails','photo')->paginate(paginate);
        return view('htmlviews.reports.paginate',compact('offers'));
    }
  
}
