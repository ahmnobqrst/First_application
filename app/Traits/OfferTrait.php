<?php

namespace App\Traits;


trait OfferTrait 
{
    public function SaveImage($image,$paths){

       $file_extension = $image->getClientOriginalExtension();
       $file_name = time().'.'. $file_extension;
       $path = $paths;
       $image->move($path,$file_name);

       return $file_name;

    }

    
}
