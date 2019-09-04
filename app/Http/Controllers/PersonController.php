<?php

namespace Equivalencias\Http\Controllers;
use Illuminate\Support\Str as Str;
use DateTime;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PersonController extends Controller{
    
    public function index(){
       
        return view('permission.noPermission');
    }

    public function store(Request $request){
        $street=Street::create([
            'street'=>$request->street_id,
            'city_id'=>$request->city_id
            ]
        );
        $person= new Person();
        $email=Email::find($request->email_id);
        $email->status_id=8;
        $email->save();
        $person->email_id = $request->email_id;
        $person->slug = str_slug($request->brith.'-'.$request->email_id.'_'.$request->id);
        $person->password = $email->password;
        $person->brith = $request->brith;
        $person->last_login = $request->last_login;
        $person->code = $request->code;
        $person->seregins = $request->seregins;
        $person->cookies = $request->cookiesP;
        $person->status_id = $request->status_id;
        $person->street_id = $street->id;
        $person->working = true;
        $person->gender_id= $request->gender_id;
        $person->save();
        // dd($person);
        // dd($request);
        
        for($i=0;$i<$request->son;$i++) {
            $son= new Son();
            $son->dateN=$request->$i;     
            $son->person_id=$person->id; 
            $son->save();
        }
        
        $message= 'Registrado con exito';
        return back()->with('message',$message);
    }

    public function show(Person $person)
    {
        //
    }
    public function update(Request $request, $id){
        
    }

    public function editDate($slug){
        $person=Person::where('slug','=',$slug)->firstOrFail();
        $date=Carbon::now();
        $person->last_login=$date->format('l jS \\of F Y h:i:s A');
        $person->save();
        $message='Se actualizo la hora de la ultimo login del usuario '. $person->name .' '. $person->lastname;
        return back()->with('message',$message);
    }

    public function destroy($slug){
        $person=Person::where('slug','=',$slug)->firstOrFail();
        $person->delete();
        $message='Se a eliminado con exito el usuario '. $person->id;
        return  back()->with('message',$message);
    }
}
