<?php
//ルームに参加していないユーザーをルームには入れないようにするmiddleware
namespace App\Http\Middleware;

use Closure;
use App\Join;
use Illuminate\Support\Facades\Auth;

class Joining
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
        if(Join::where($request->id) == Join::where('user_id',Auth::user()->id)){
            return redirect('home');
        }
        return $next($request);
    }
}
