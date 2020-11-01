<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gender;
use Illuminate\Support\Facades\Auth;

class genderController extends Controller
{
   function editGender(){
       
       if (Auth::user()){
      /*  $user = Auth::user();*/ 
       return view('gender')->with('user',auth()->user());
       }
   }
   function updateGender(Request $request){
       $request->validate([
           'gender'=> 'required'
       ]);
       $user = Auth::user();
       $user->update([
           'gender'=> $request->gender
           
       ]);
//       dd($user);
       /*Session::flash('alert-class','gender updated successfuly');
       $request->session()->flash('status', 'Task was successful!');*/
       return view('dashboard');
       
   }
}
