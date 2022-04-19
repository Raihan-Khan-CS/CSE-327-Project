<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class IsbanMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
          //User banned and Unbanned
          if(Auth::check() && Auth::user()->inban){
            $banned = Auth::user()->inban == '1';
            Auth::logout();
            if($banned == 1){
                $message = 'Your Account has been Banned. Please contact with administration.';
            }
            return redirect()->route('login')->with('status',$message)->withErrors([
                'banned' => 'Your Account has been banned. Please Contact with administration',
            ]);
        }else{
        return $next($request);
        }
    // return $next($request);

    }
}
