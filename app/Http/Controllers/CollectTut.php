<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;
use App\Models\Offer;

class CollectTut extends Controller
{
    
    public function index(){
       /* $numbers = [20,45,19,24];

        $col = collect($numbers); ===========>>>> this tools convert array to collect and you can make all opertaions on this collect

        return $col->avg();*/

        $names = collect(['name','age']);
      return $res = $names->combine(['ahmed',23]);

    }

    public function each_func(){
      /*$selct = Phone::get();

      $selct->each(function($add){
        unset($add->code);

        $add->country = 'egypt';
        return $add;
      });
      return $selct;
      */

       $offers = Offer::get();

       $offers->each(function($cat){ ##====>> this method help if you want change in format of the data 

        if($cat->status == 'notactive'){

          unset($cat->name_ar);##=========> to delete column name_ar from result where [status == 'notactive']
          unset($cat->details_ar);
        }
         

          $cat->offer_view = "this is offerview of the offers"; ##====>> if you want to add column to result without find in the model called [offer_view]
         return $cat;
       });

       return $offers;
    }


    public function filteration(){ ###==========>>>> if i want show in result some of data only
   
     $offers = Offer::get();

      $offers = collect($offers);

     $result = $offers->filter(function($value,$key){

      return $value['status'] == 'notactive';

     });

   // return $result; ==========>>>>>>>>> this code will return [values with key] so we can delete it to not complex in view

    return array_values($result->all());  // return result without key
    
    }

    public function transform_data(){
        $offers = Offer::get();
        $offers = collect($offers);

        $res = $offers->transform(function($value,$key){###==========> this method return to you only key of object to reuse it in api
            
            $data = [];
            $data['name'] = $value['name_en'];
            $data['details'] = $value['details_en'];

            return $data;
            

        });
        return $res;
    }
}
