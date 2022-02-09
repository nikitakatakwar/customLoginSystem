<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomAuthController extends Controller
{
   

    public function registration()
    {
        return view('registration');
    }
    public function registeruser(Request $req)
    {
       $req->validate([
           'name'=>'required',
           'email'=>'required',
           'password'=>'required',
       ]); 
       $user = new User();
       $user->name=$req->name;
       $user->email=$req->email;
       $user->password=Hash::make($req->password);
       $res=$user->save();
       if( $res)
       {
         return back()->with('success','You Have Registered Successfully....!!');
       }
       else
       {
        return back()->with('fail','Something Went Wrong....!!');
       }
    }
    public function loginUser(Request $req)
    {
        $req->validate([
            'email'=>'required',
            'password'=>'required',
        ]); 
         $user = User::where('email','=',$req->email)->first();
         if($user){
            if(Hash::check($req->password,$user->password)){
              $req->session()->put('loginId',$user->id);
              return view('guest');
            }
            else{
                return back()->with('fail','Password Is Not Match....!!');
            }
         }
         else
         {
          return back()->with('fail','Email Is Not Registerd....!!');
         }
    }

    public function dashboard()
    {
        return view('dashboard');
    }

  
}
