<?php

namespace Equivalencias\Http\Controllers;

use Illuminate\Http\Request;
use Equivalencias\Content;

class adminCurricular extends Controller
{
    
    public function verify($slug){
        //
        $content=Content::where('slug',$slug)->first();
        $content->confirmation=true;
        $content->status=1;
        $content->save();
        return back()->with('success','Contenido Verificado.');
    }

    public function remove($slug){
        $content=Content::where('slug',$slug)->first();
        $content->confirmation=false;
        $content->status=0;
        $content->save();
        return back()->with('success','Contenido Verificado.');
    }

    public function show($slug){
        //
    }

    public function rollback($id)
    {
        //
    }
}
