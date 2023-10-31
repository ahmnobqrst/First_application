<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $table = 'Products';
   protected $fillable = ['p_price','name_ar','name_en','desc_ar','desc_en'];
   protected $hidden =['created_at','updated_at'];
   public $timestamps = false;
}
