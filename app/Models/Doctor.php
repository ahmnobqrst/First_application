<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Doctor extends Model
{
    protected $table='doctors';
    protected $fillable =['name','title','gender','hospital_id','medical_id','created_at','updated_at'];
    protected $hidden = ['hospital_id','created_at','updated_at'];
    public $timestamps = true;



    public function hospitals(){
        return $this->belongsTo('App\Models\Hospital','hospital_id','id');
    }

    public function services(){
        return $this->belongsToMany('App\Models\Service','doctor_service','doctor_id','service_id','id','id');
    }

    // accessors

    public function getGenderAttribute($q){
        return $q == 1 ?'male':'female';
    }

}
