<?php

namespace Equivalencias\Http\Controllers;

use Equivalencias\Area;
use Equivalencias\Career;
use Equivalencias\Matter;
use Equivalencias\Content;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $career=Career::all();
        $area=Area::all();
        return view('career.index',compact('area','career'));
    }
    public function store(Request $request){
        $slug=str_slug($request->modalidad.'-'.$request->career.'_'.rand());
        $career=Career::create(['career'=>$request->career,'modalidad'=>$request->modalidad,'slug'=>$slug,'area_id'=>$request->area_id]);
        return back()->with('success','Exito');
    }
    public function show($id){
        $career=Career::where('area_id','=',$id)->get();
        return $career;
    }
    public function MatterCareerShow($slug){
        $career=Career::where('slug','=',$slug)->first();
        $matter=Matter::where('career_id','=',$career->id)->get();
        // $content=Content::where('matter_id','=',$matter->id)->get();
        // dd($matter);
        return view('career.matterUser',compact('matter','career','content'));
    }
    public function update(Request $request, $slug){
        $career=Career::where('slug','=',$slug)->firstOrFail();
        $career->career=$request->career;
        $career->modalidad=$request->modalidad;
        $career->area_id=$request->area_id;
        $career->save();
        return $career;
    }
    public function destroy($slug){
        // $career=Career::where('slug','=',$slug)->firstOrFail();
        // dd('hola');
        // $career->delete();
        // return back()->with('success','Exito');
    }
    public function delete($slug){
        $career=Career::where('slug','=',$slug)->firstOrFail();
        $career->delete();
        return back()->with('success','Exito');
    }
}
