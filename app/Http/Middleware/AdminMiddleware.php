<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth,Session;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user=User::find(Auth::user()->id);
        if(!Auth::guest() && $user->isAdmin)
        {
           return $next($request);
        }
            Session::flash('danger',$user->name.' is not an Administrator');
            return redirect('/library');
        
    }
}
