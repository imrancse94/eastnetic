<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;

class RoleCheck
{
    use ApiResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if admin then go
        if(auth()->user()->user_type == config('constant.ADMIN_USER_TYPE')){
            return $next($request);
        }

        return $this->sendError(__("You don't have permission"),[],config('constant.PERMISSION_ERROR'));
    }
}
