<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\Auth\Guard;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
     protected $auth;

     public function __construct(Guard $auth)
     {
         $this->auth = $auth;
     }
 
 
     public function handle($request, Closure $next)
     {
         if ($this->auth->getUser()->type !== "admin") {
             abort(403, 'Unauthorized action.');
         }
         return $next($request);
}


}