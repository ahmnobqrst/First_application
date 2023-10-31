<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\EloquentUserProvider;
use App\Models\Admin;

use Auth;

class MidController extends Controller
{
    public function adult(){
        return view('middviews.create');
    }
     public function site(){
        return view('site');
    }
     public function admin(){
        return view('admin');
    }


    public function adminlogin(){
      return view('htmlviews.adminlogin');
    }

    public function saved(Request $result){

     $this->validate($result, [
     'email'=>'required|email',
     'password'=>'required|min:6',

     ]);

     if(Auth::guard('admin')->attempt(['email'=>$result->email,'password'=>$result->password])){
      return redirect()->intended('/admin');
     }


     return back()->withInput($result->only('email'));
    

      }
}
