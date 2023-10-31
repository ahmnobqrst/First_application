<?php

namespace App\Traits;


trait Product_Trait 
{
    public function SaveImageOffer($image,$paths){

       $file_extension = $image->getClientOriginalExtension();
       $file_name = time().'.'. $file_extension;
       $path = $paths;
       $image->move($path,$file_name);

       return $file_name;

    }

    
}
