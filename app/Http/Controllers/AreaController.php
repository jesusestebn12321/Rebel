<?php

namespace Equivalencias\Http\Controllers;

use Equivalencias\Area;
use Equivalencias\Address;
use Equivalencias\University;
use Illuminate\Http\Request;
use Equivalencias\Http\Requests\AreaRequests;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $area=Area::paginate(10);
        $address=Address::all();
        $university=University::all();
        return view('areas.index',compact('area','university','address'));
    }

    public function create(){

    }

    public function store(AreaRequests $request){
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
        return back()->with('success','Se a creado con exito el area');

    }

    public function show($id){
        $area=Area::Where('career_id','=',$id)->get();
        return $area;
    }

    public function update(AreaRequests $request, $slug){
       $area=Area::where('slug','=',$slug)->first();
       $area->area=$request->area;
       $area->university_id=$request->university_id;
       $area->address_id=$request->address_id;
       $area->save();
       return $area;
   }

    public function destroy($slug){
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
            return back()->with('success','Se a borrado con exito el area');
        } catch (Illuminate\Database\QueryException $e) {
            return back()->with('success','Se produjo un error esta area contiene carreras');
        }
    }
}
