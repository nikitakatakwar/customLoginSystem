<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    { 
      $name = $request->input('email');
      if ($name == 'sami@123gmail.com') 
      {
        return redirect('/dashboard');
        return back()->withErrors([
            'password' => ['The provided password does not match our records.']
        ]);
    }

        //dd($name);
       
        return redirect('nik');
       
    }
}
