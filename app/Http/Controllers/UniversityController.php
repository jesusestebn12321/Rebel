<?php
namespace Equivalencias\Http\Controllers;
use Equivalencias\University;
use Illuminate\Http\Request;
use Equivalencias\Address;
use Equivalencias\Http\Requests\UniversityRequest;
class UniversityController extends Controller{
    public function index(){
        $university=University::all();
        $address=Address::all();
        return view('university.index',compact('university','address'));
    }
    public function store(UniversityRequest $request){
        if($request->address!=''){
            $slug=str_slug($request->address.'_'.rand());
            $address=Address::create([
                'slug'=>$slug,
                'addres'=>$request->address,
                ]);
            $request->address_id=$address->id;       
        }
        $slug=str_slug($request->university.'-'.$request->address_id.'_'.rand());
        $university=University::create([
            'university'=>$request->university,
            'address_id'=>$request->address_id,
            'slug'=>$slug,
            ]);
        return back()->with('success','<script>swal({
            title: "Exito!",
          text: "La universidad se creo con exito!",
          icon: "success",
      })</script>');
    }
    public function show($id){
    }
    public function update(UniversityRequest $request,$id){
        $university=University::Where('id','=',$request->id)->firstOrFail();
        $university->university=$request->university;
        $university->address_id=$request->address_id;
        $university->save();
        return $university;

    }
    public function destroy($slug){
        $university=University::Where('slug','=',$slug)->firstOrFail();
        $university->delete();
        return back()->with('success','<script>swal({
            title: "Exito!",
          text: "La universidad se ha eliminado",
          icon: "success",
      })</script>');
    }
    public function delete($slug){
        $university=University::Where('slug','=',$slug)->firstOrFail();
        $university->delete();
        return back()->with('success','<script>swal({
            title: "Exito!",
          text: "La universidad se ha eliminado",
          icon: "success",
      })</script>');
    }
}