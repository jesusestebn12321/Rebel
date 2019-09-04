<?php

namespace Equivalencias\Http\Controllers;

use Equivalencias\Area;
use Equivalencias\Address;
use Equivalencias\University;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $area=Area::all();
        $address=Address::all();
        $university=University::all();
        return view('areas.index',compact('area','university','address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        if($request->address!=''){
            $slug=str_slug($request->address.'_'.rand());
            $address=Address::create([
                'slug'=>$slug,
                'addres'=>$request->address,
            ]);
            $request->address_id=$address->id;       
        }
        $slug=str_slug($request->area.'-'.$request->university_id.'-'.$request->address_id.'_'.rand());
        
        $area=Area::create([
            'area'=>$request->area,
            'address_id'=>$request->address_id,
            'university_id'=>$request->university_id,
            'slug'=>$slug,
        ]);
        return back()->with('success','Exito');

    }

    public function show($id){
        $area=Area::Where('career_id','=',$id)->get();
        return $area;
    }

    public function update(Request $request, $slug){
       $area=Area::where('slug','=',$slug)->first();
       $area->area=$request->area;
       $area->university_id=$request->university_id;
       $area->address_id=$request->address_id;
       $area->save();
       return $area;
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Equivalencias\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug){
        dd('hola');
        try {
            $area=Area::Where('slug','=',$slug)->firstOrFail();
            $area->delete();
            return back()->with('success','Exito');
        } catch (Illuminate\Database\QueryException $e) {

            return back()->with('success','Error esta area contiene carreras');
        }
    }
    public function delete($slug){
        try {
            $area=Area::Where('slug','=',$slug)->firstOrFail();
            $area->delete();
            return back()->with('success','Exito');
        } catch (Illuminate\Database\QueryException $e) {

            return back()->with('success','Error esta area contiene carreras');
        }
    }
}
