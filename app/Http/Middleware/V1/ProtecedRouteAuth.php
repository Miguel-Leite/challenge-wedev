<?php

namespace App\Http\Middleware\V1;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class ProtecedRouteAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      try {
        $user = JWTAuth::parseToken()->authenticate();
      } catch (\Exception $e) {
        if ($e  instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
          return response()->json(['status' => 'Token is invalid'], 401);
        }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
          return response()->json(['status' => 'Token is invalid'], 401);
        } else {
          return response()->json(['status' => 'Authorization Token not found'], 401);
        }
      }

      return $next($request);
    }
}
