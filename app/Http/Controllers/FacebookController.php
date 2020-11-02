<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Socialite;
use Auth;
use Exception;

class FacebookController extends Controller {

    public function redirectToProvider() {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback() {

   
      
          try {
          $user = Socialite::driver('facebook')->user();
          $finduser = User::where('facebook_id', $user->id)->first();
          if ($finduser) {
          Auth::login($finduser);
          return redirect('/dashboard');
          } else {

          $newUser = User::create([
          'national_id'=>$user->email,
          'name' => $user->name,
          'email' => $user->email,
          'facebook_id' => $user->id,
          'password' => encrypt('1234568')
          ]);
          Auth::login($newUser,true);
          return redirect('/dashboard');
          }
          } catch (Exception $e) {

          dd($e->getMessage());
          } 
    }

}
