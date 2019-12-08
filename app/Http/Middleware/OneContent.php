<?php

namespace Equivalencias\Http\Middleware;

use Closure;
use Equivalencias\Content;
use Equivalencias\Matter;
class OneContent
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
        $matter=Matter::where('slug',$request->route('slug'))->first();
        $content=Content::where('status',1)->where('matter_id',$matter->id)->get();
        //dd($content);
        if($content->count()>1){
            return redirect()->route('content.error');
        }else{

            return $response;
        }

    }
}
