<?php

namespace Equivalencias\Http\Controllers;

use Illuminate\Http\Request;
use Equivalencias\Content;
use Equivalencias\Matter;
use input;
class adminCurricular extends Controller
{
    
    public function verify($slug){
        $content=Content::where('slug',$slug)->first();
       
        $content_verify=Content::where('matter_id',$content->matters->id)->get();

        foreach ($content_verify as $item) {
            # code...
            $item->confirmation=false;
            $item->status=0;
            $item->save();
        }
        //dd($content);
        $content->confirmation=true;
        $content->status=1;
        $content->save();

        return back()->with('success','Contenido Verificado.');
    }
    public function one_content($id,Request $request){
        $matter=Matter::where('id',$id)->first();
        foreach ($request->input() as $item) {
            foreach ($matter->content as $items) {
                if ($item == $items->id) {
                    $items->status=0;
                    $items->confirmation=false;
                    $items->save();
                }
            }
        }    
        return redirect()->route('Matters.show',$matter->slug);
    }

    public function remove($slug){
        $content=Content::where('slug',$slug)->first();
        $content->confirmation=0;
        $content->status=0;
        //dd($content);
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
