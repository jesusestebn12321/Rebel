<?php

namespace Equivalencias\Http\Controllers;

use Illuminate\Http\Request;

use Equivalencias\contentVersion;
use Equivalencias\Download;
use Equivalencias\StudentMatter;
use Equivalencias\MatterUser;
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
        $matter_user=MatterUser::where('user_id','=',Auth::user()->id)->first();
        $teacher=Teacher::where('user_id','=',Auth::user()->id)->first();
        $area= Area::all();
        $matter= Matter::all();
        $career= Career::all();
        if (Auth::user()->hasRole(3)) {
            $matter_user=StudentMatter::where('user_id',Auth::user()->id)->get();
            return view('homeStudent',compact('matter_user'));      
        }else{
            return view('home',compact('matter_user','matter','area','career','teacher'));      
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
            $download= Download::all()->count();

            $label=['Estudiantes','Profesores','Coordinadores','Areas','Carreras','Materias','Contenidos','Versiones de Contenidos','Descargas'];

            $data = [$students,$teacher,$coordinadores,$area,$career,$matter,$content,$contentV,$download];
            $json=array("label"=>$label,"data"=>$data);
            return $json;

        }
        elseif (Auth::user()->hasRole(2) || Auth::user()->hasRole(4)) {
            # code...

            $teacher=Teacher::where('rol_id','=',2)->get()->count();
            $coordinadores=Teacher::where('rol_id','=',5)->get()->count();
            $contents= MatterUser::where('user_id',Auth::user()->id)->first();
            $content=$contents->matter->content->count();
            

            $label=['Profesores','Coordinadores','Contenidos'];

            $data = [$teacher,$coordinadores,$content];
            $json=array("label"=>$label,"data"=>$data);
            return $json;      
        }
    }
    public function chartDownload(){
        if(Auth::user()->hasRole(1)){
            $enero=0;
            $febrero=0;
            $marzo=0;
            $abril=0;
            $mayo=0;
            $junio=0;
            $julio=0;
            $agosto=0;
            $septiembre=0;
            $octubre=0;
            $noviembre=0;
            $diciembre=0;
            $download=Download::all();
            foreach ($download as $key => $item) {
                if($item->created_at->format('m')==1){$enero++;}
                else if($item->created_at->format('m')==2){$febrero++;}
                else if($item->created_at->format('m')==3){$marzo++;}
                else if($item->created_at->format('m')==4){$abril++;}
                else if($item->created_at->format('m')==5){$mayo++;}
                else if($item->created_at->format('m')==6){$junio++;}
                else if($item->created_at->format('m')==7){$julio++;}
                else if($item->created_at->format('m')==8){$agosto++;}
                else if($item->created_at->format('m')==9){$septiembre++;}
                else if($item->created_at->format('m')==10){$octubre++;}
                else if($item->created_at->format('m')==11){$noviembre++;}
                else if($item->created_at->format('m')==12){$diciembre++;}
            }
            $semana1=0;
            $semana2=0;
            $semana3=0;
            $semana4=0;
            foreach ($download as $key => $item) {
                $day=$item->created_at->format('d');
                if($day<=7){
                    $semana1++;
                }else if($day<=14){
                    $semana2++;
                }
                else if($day<=21){
                    $semana3++;
                }
                else if($day>=22){
                    if ($day<28) {
                        # code...
                        $semana4++;
                    }
                    
                }
            }


            $labelS=['Semana 1', 'Semana 2', 'Semana 3', 'Semana 4'];
            $dataS= [$semana1,$semana2,$semana3,$semana4];

            $label=['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agusto','Septiembre','Octubre','Noviembre','Dicciembre'];
            $data = [$enero,$febrero,$marzo,$abril,$mayo,$junio,$julio,$agosto,$septiembre,$octubre,$noviembre,$diciembre];
            
            $json=array("data"=>$data,"label"=>$label,"dataS"=>$dataS,"labelS"=>$labelS);

            return $json;
        }
    }
}
