<?php

namespace App\Http\Middleware;

use App\Exceptions\ExceptionAPI;
use App\Models\User;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     * @throws ExceptionAPI
     */
    public function handle(Request $request, Closure $next)
    {
        $id = Auth::user()->id??null;



        if (is_null($id))
           return redirect()->route("page.not-found");

        $user = User::query()->with(["role"])
            ->where("id", $id)
            ->first();

        if (is_null($user))
            return redirect()->route("page.not-found");

        if ($user->role->name!=="admin")
            return redirect()->route("page.not-found");

        return $next($request);
    }
}
