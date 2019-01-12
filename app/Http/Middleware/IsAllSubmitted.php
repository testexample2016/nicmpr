<?php

namespace App\Http\Middleware;

use Closure;

use App\User;

use Illuminate\Support\Facades\Gate;

class IsAllSubmitted
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
        $flag=true;

        $employees = User::all();

        foreach ($employees as $employee){

             if(!$employee->isAdmin && $employee->projects()->exists()){

                 if (Gate::forUser($employee)->allows('final-submit')) {

                    $flag=false;
                 }
             }
        }

         if ($flag)
        {
            return $next($request);
        }

        return back();
    }
}
