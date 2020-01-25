<?php

namespace Equivalencias\Http\Controllers;

use Equivalencias\contentVersion;
use Equivalencias\Teacher;
use Equivalencias\Career;
use Equivalencias\Matter;
use Equivalencias\Content;
use Equivalencias\Area;
use Auth;

use Illuminate\Http\Request;
use Equivalencias\Http\Requests\CareerRequests;


class CareerController extends Controller
{
    
    public function index(){
        $career=Career::paginate(10);
        $area=Area::all();
        return view('career.index',compact('area','career'));
    }
    public function store(CareerRequests $request){
        $slug=str_slug($request->modalidad.'-'.$request->career.'_'.rand());
        $career=Career::create(['career'=>$request->career,'modalidad'=>$request->modalidad,'slug'=>$slug,'area_id'=>$request->area_id]);
        return back()->with('success','Se a creado con exito la carrera');
    }
    public function show($id){
        $career=Career::where('area_id','=',$id)->get();
        return $career;
    }
    public function showMatter($slug){
        $career=Career::where('slug',$slug)->first();
        $matter=Matter::where('career_id',$career->id)->get();
        $teacher=Teacher::where('user_id',Auth::user()->id)->first();
        $contentV=contentVersion::all();
        return view('matter.adminCurricular.index',compact('career','matter','matter_user','teacher','contentV'));
    }
    public function MatterCareerShow($slug){
        $career=Career::where('slug','=',$slug)->firstOrFail();
        $matter=Matter::where('career_id','=',$career->id)->get();
        return view('career.matterUser',compact('matter','career'));
    }
    public function update(CareerRequests $request, $slug){
        $career=Career::where('slug','=',$slug)->firstOrFail();
        $career->career=$request->career;
        $career->modalidad=$request->modalidad;
        $career->area_id=$request->area_id;
        $career->save();
        return $career;
    }
    public function destroy($slug){

    }
    public function delete($slug){
        $career=Career::where('slug','=',$slug)->firstOrFail();
        $career->delete();
        return back()->with('success','Se a borrado con exito la carrera');
    }
}
