<?php

namespace app\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Redirect;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     protected $auth;
/*
     public function __construct(Guard $auth)
     {
       $this->auth = $auth;
     }*/

     public function __construct(Guard $auth)
     {
       $this->auth = $auth;
     }

    public function handle($request, Closure $next)
    {
    //dd($this->auth->user());
        if (!$this->auth->user())
          {
            //no logeado
            return redirect()->guest('auth/login');

          }else {
            //return $request->session()->flush();

            return $next($request);

          }


    }
}
