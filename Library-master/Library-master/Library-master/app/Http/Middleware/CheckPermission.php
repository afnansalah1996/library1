<?php

namespace App\Http\Middleware;

use Closure;
use App\Link;
class CheckPermission
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


      $response = $next($request);
          $user = \Auth::user();
          $url = '/'.request()->path();
          $link = Link::where('url',$url)->first();
          if($user && !$user->active && $url!='/disabled-user'){
              \Auth::logout();
              \Session::flash('msg', 'User has been disabled');
              return redirect('/login?disabled_user=1');
          }
          if($link && $user){
              //هل المستخدم يملك صلاحية على الرابط المطلوب
              $havePermission = $user->links()->where('link_id',$link->id)->count();
              //$havePermission = $user->links()->get()->where('id',$link->id)->count();
              if(!$havePermission){
                  return redirect('/no-access');
              }
          }
          return $response;
      }
}
