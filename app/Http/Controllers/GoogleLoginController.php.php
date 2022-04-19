<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function callback($provider)
    {
        $getInfo = Socialite::driver($provider)->user();
        $user = $this->createUser($getInfo,$provider);
        auth()->login($user);
        return redirect()->to('/home');
    }
    function createUser($getInfo,$provider){

     $user = User::where('provider_id', $getInfo->id)->first();
     if (!$user) {
         $user = User::create([
            'name'     => $getInfo->name,
            'email'    => $getInfo->email,
            'phone'    => '+088**********',
            'password'    => bcrypt('12345678'),
            'image' => 'public/frontend/pp.png',
            'provider' => $provider,
            'provider_id' => $getInfo->id
        ]);
      }
      return $user;
    }
}
