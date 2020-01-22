<?php

namespace Equivalencias\Http\Controllers;

use Illuminate\Http\Request;

use Equivalencias\contentVersion;
use Equivalencias\StudentMatter;
use Equivalencias\Content;
use Equivalencias\Teacher;
use Equivalencias\Matter;
use Equivalencias\Career;
use Equivalencias\User;
use Equivalencias\Area;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $teacher=Teacher::where('user_id','=',Auth::user()->id)->first();
        $area= Area::all();
        $matter= Matter::all();
        $career= Career::all();
        if (Auth::user()->hasRole(3)) {
            $matter_user=StudentMatter::where('user_id',Auth::user()->id)->get();
            return view('homeStudent',compact('matter_user'));      
        }else{
            return view('home',compact('matter','area','career','teacher'));      
        }
        
    }
    public function chart(){
        
        if(Auth::user()->hasRole(1)){

            $teacher=Teacher::where('rol_id','=',2)->get()->count();
            $coordinadores=Teacher::where('rol_id','=',5)->get()->count();
            $students=User::where('rol_id','=',3)->get()->count();
            $area= Area::all()->count();
            $content= Content::all()->count();
            $contentV= contentVersion::all()->count();
            $matter= Matter::all()->count();
            $career= Career::all()->count();

            $label=['Estudiantes','Profesores','Coordinadores','Areas','Carreras','Materias','Contenidos','Versiones de Contenidos'];

            $data = [$students,$teacher,$coordinadores,$area,$career,$matter,$content,$contentV];
            $json=array("label"=>$label,"data"=>$data);
            return $json;

        }
        elseif (Auth::user()->hasRole(2) || Auth::user()->hasRole(4)) {
            # code...

            $teacher=Teacher::where('rol_id','=',2)->get()->count();
            $coordinadores=Teacher::where('rol_id','=',5)->get()->count();
            $contents= Teacher::where('user_id',Auth::user()->id)->first();
            $content=$contents->matter->content->count();

            $label=['Profesores','Coordinadores','Contenidos'];

            $data = [$teacher,$coordinadores,$content];
            $json=array("label"=>$label,"data"=>$data);
            return $json;      
        }
    }
}
