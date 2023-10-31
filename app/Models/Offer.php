<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\OfferScope;

class offer extends Model
{
   protected $table = 'offers';
   protected $fillable = ['name_ar','name_en','price','details_ar','details_en','photo','status'];
   protected $hidden =['created_at','updated_at'];
   public $timestamps = false;

   #################### register global scope for this model ################
   
   /*protected static function boot()
    {
        parent:: boot();
        static::addGlobalScope(new OfferScope);
    }
    */


   public function scopeInvalid($q){ // local scope
      return $q ->where('status',0);
   }

   public function scopeInactive($q){   // local scope
      return $q->where('status',1)->whereNotNull('details_ar')->whereNotNull('details_en');
   }

   /////////////// accessors

   public function getStatusAttribute($q){
      return $q == 1?'active':'notactive';
   }

   /////////////////// mutators //////////

   public function setNameEnAttribute($q){
      $this->attributes['name_en'] = strtoupper($q);
   }


}
