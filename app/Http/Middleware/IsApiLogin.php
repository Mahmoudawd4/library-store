<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class IsApiLogin
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

        // if ($request->has('access_token'))
        // {
        //     if($request->access_token !== null)
        //     {
        //         $user=User::where('access_token',$request->access_token)->first();
        //         if($user!== null)
        //         {
        //             return $next($request);
        //         }else
        //         {
        //             response()->json("access token is not correct");
        //         }

        //     }else{
        //         response()->json("access token is empty");
        //     }
        // }else{
        //     response()->json("there is no access token");
        // }

                   //return $next($request);

         if(isset($request->access_token) && $request->access_token!=null)
        {
         $user=User::where('access_token',$request->access_token)->first();
            if($user!=null)
                return $next($request);
        }

        return response()->json(['error'=>'not valid request']);


    }
}
