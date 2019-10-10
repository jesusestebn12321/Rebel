<?php

namespace Equivalencias\Http\Controllers;

use Equivalencias\MatterUser;
use Equivalencias\User;
use Equivalencias\Matter;
use Equivalencias\Career;
use Equivalencias\Area;
use Illuminate\Http\Request;
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
        $matter_user=MatterUser::where('user_id','=',Auth::user()->id)->first();
        $area= Area::all();
        $matter= Matter::all();
        $career= Career::all();
        if (Auth::user()->hasRole(2)) {
            $matter_user=MatterUser::where('user_id','=',Auth::user()->id)->get();
            return view('homeStudent',compact('matter_user'));      
        }else{
            return view('home',compact('matter_user','matter','area','career'));      
        }
        
    }
    public function chart(){
        $teacher=User::where('rol','=',1)->get()->count();
        $students=User::where('rol','=',2)->get()->count();
        $area= Area::all()->count();
        $matter= Matter::all()->count();
        $career= Career::all()->count();
        $label=['Estudiantes','Profesores','Areas','Carreras','Materias'];
        $data = [$students,$teacher,$area,$career,$matter];
        $json=array("label"=>$label,"data"=>$data);
        return $json;      
    }
}
