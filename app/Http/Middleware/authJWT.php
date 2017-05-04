<?php

namespace App\Http\Middleware;

use Closure;
use Modules\App\Repositories\JwtAuthRepository;

class authJWT
{
    private $jwtAuthRepo;
    public function __construct(JwtAuthRepository $jwtAuthRepo)
    {
        $this->jwtAuthRepo = $jwtAuthRepo;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->header('token')){
          return response()->json(['error'=>'Plz Provide Token MW'],401);
        }
        $myflag = $this->jwtAuthRepo->checkApp($request->header('token'));
        if(!$myflag){
          return response()->json(['error'=>'Token is Expired MW'],401);
        }
        return $next($request);
    }
}
