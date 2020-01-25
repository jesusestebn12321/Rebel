<?php

namespace Equivalencias\Http\Controllers;
use Illuminate\Http\Request;
use Equivalencias\Http\Requests\DownloadRequests;
use Equivalencias\Rules\Captcha;

use Equivalencias\contentVersion;
use Equivalencias\StudentMatter;
use Equivalencias\MatterUser;
use Equivalencias\Download;
use Illuminate\Support\Arr;
use Equivalencias\Content;
use Equivalencias\Teacher;
use Equivalencias\Matter;
use Equivalencias\Career;
use Equivalencias\Area;
use Carbon\Carbon;
use collect;
use Auth;
use json;
use PDF;
use Validator;
use Illuminate\Support\Collection;
class DownloadController extends Controller
{
    //descargar pdf Equivalencias para los estudiantes 

    public function paginacion($campo,$caracteres){
        $palabra=$campo;
        $palabra=explode(' ', $palabra);
        $n= count($palabra);
        $x='';
        $i=0;
        foreach ($palabra as $item) {
            # code...
            $i++;
            if ($caracteres==$i) {
                # code...
                $x= $x.' '.$item . '<br>' ;
                $i=0;
            } else {
                # code...
                $x= $x.' '.$item;
            }
        }
        $campo=$x;
        $i=0;
        return $campo;
    }
    public function corte($margen,$model_arg,$corte_en,$thead_arg){
        $model=$model_arg;
        $conut_model=$model->count()/$corte_en;
        $i=0;
        $x=0;
        $thead='';
        foreach ($model as $key => $item) {
            if ($i==$corte_en) {
                for ($q=0; $q < count($thead_arg); $q++) { 
                    $thead= $thead .'<th class="th" colspan=9 Valign="center">
                    <p align=center style="width: 10px">
                        <h3>'.$thead_arg[$q]['name'].'</h3>
                    </p>
                </th>';
            }                
            $html=[ 'id'=>$key,'html'=>'<table class="table" cellpadding="7" cellspacing="0" style="margin-top:'. $margen .'cm  !important"><col><col><col><col>
                <thead>'.$thead.'</thead>
            <tbody>'];
                $paginacion[$x]=Arr::add($html,$x,null);
                $i=0;
                $x++;
            }else{

                $i++;
            }
            $thead='';
        }
        return $paginacion;
    }

    public function createRegisterDownload(Request $request){
        //dd($request);
        $rule=['g-recaptcha-response' => new Captcha()];
        $message=[];

        $validator=Validator::make($request->all(), $rule,$message);
        if($validator->fails()){
            $message='Debe Completar el reCatcha';
            return false;
        }else{

            $slug=str_slug('downloand-'.Auth::user()->id.'-'.now().'-equivalencia');

            return  Download::Create([
                'slug'=>$slug,
                'user_id'=>Auth::user()->id,
                'start_student'=>now(),
                'last_student'=>now(),
                'status'=>false,
                ]);
        }

    }


    public function equivalenciaStudents($slug, Request $request){

        $matter_user= StudentMatter::where('user_id',Auth::user()->id)->get();
        $i=0;

        foreach ($matter_user as $item) {
            $contentP='';
            $justification='';
            $purpose='';

            $version=$item->version;
            $content=Content::where('version',$version)
            ->where('matter_id',$item->id)->first();
                //dd($content);
            if (!$content) {
                foreach ($item->matter->content as $items) {
                    $content_version=contentVersion::where('content_id',$items->id)->get();
                    foreach ($content_version as $item_version) {
                        if ($item_version->version == $version) {
                            $contents[$i]=Arr::add($item_version,$i,null);
                            //dd($contents);
                            $contentP=$this->paginacion($item_version->content,20);
                            $justification=$this->paginacion($item_version->justification,20);
                            $purpose=$this->paginacion($item_version->purpose,20);

                            $contenidos_paginados[$i]=array('content' => $contentP,'justification'=> $justification,'purpose'=>$purpose );
                        }
                    }
                }
            }if($content){
                $contents[$i]=Arr::add($content,$i,null);

                $contentP=$this->paginacion($content->content,20);
                $justification=$this->paginacion($content->justification,20);
                $purpose=$this->paginacion($content->purpose,20);


                $contenidos_paginados[$i]=array('content' => $contentP,'justification'=> $justification,'purpose'=>$purpose );

            }
            $i++;
        }
        $contenidos_paginados=Collection::make($contenidos_paginados);
        $download=$this->createRegisterDownload($request);
        if($download==false){
            return redirect()->route('home')->with('messages','No completo el reCatcha');
        }else{
            $url=url('/VerificarEquivalencia/{'.Auth::user()->id.'}/');
            $pdf=PDF::loadView('pdf.equivalencia',compact('contents','contenidos_paginados','today','url'))->setOptions(['dpi' => 200, 'defaultFont' => 'sans-serif']);

            $pdf->download('Equivalencia_'.Auth::user()->dni.'_'.now().'.pdf');
            return $pdf->stream('Equivalencia_'.Auth::user()->dni.'_'.now().'.pdf');
        }
    }
    //descargar pdf de los profesores
    public function adminTeacher(){
        $teacher=Teacher::all();
        $today = Carbon::now()->format('l jS \\of F Y h:i:s A');
        $url=url('/Teacher');
        $pdf=PDF::loadView('pdf.teacherAll',compact('teacher','today','url'));
        $pdf->download('ReportesDeLosTeacher'.now().'.pdf');
        return $pdf->stream();
    }
    //descargar pdf de las materias
    public function adminMatter(){
        $matter=Matter::all();
        $today = Carbon::now()->format('l jS \\of F Y h:i:s A');
        $url=url('/Matter');
        $pdf=PDF::loadView('pdf.teacherAll',compact('matter','today','url'));
        $pdf->download('ReportesDeLasMaterias'.now().'.pdf');
        return $pdf->stream();
    }
    //descargar pdf careras 
    public function adminArea(){
        $thead = array(
            ['name' =>'ID'],
            ['name' =>'Universidad'],
            ['name' =>'Area'],
            ['name' =>'Coordenadas'],
            ['name' =>'Creada'],
            );
        $area=Area::all();
        $corte=$this->corte(2,$area,18,$thead);

        $today = Carbon::now()->format('l jS \\of F Y h:i:s A');
        $url=url('/Areas');
        $pdf=PDF::loadView('pdf.areaAll',compact('corte','area','pdf','today','url'))->setOptions(['dpi' => 200, 'defaultFont' => 'sans-serif']);
        $pdf->download('ReportesDeLasAreas.pdf');
        return $pdf->stream();
    }
    public function adminCareer(){
        $career=Career::all();
        $today = Carbon::now()->format('l jS \\of F Y h:i:s A');
        $url=url('/Careers');
        $pdf=PDF::loadView('pdf.careerAll',compact('career','today','url'));
        $pdf->download('ReportesDeLasCarreras'.now().'.pdf');
        return $pdf->stream();
    }
    //descargar pdf materias y contenido de la materias del profesor correspondiente
    public function teacherMatter($slug){
        $teacher=Teacher::where('user_id',Auth::user()->id)->first();
        $today = Carbon::now()->format('l jS \\of F Y h:i:s A');
        $url=url('/VerificarDescargaProfesor/'.Auth::user()->id);
        $matter_user=MatterUser::where('user_id',Auth::user()->id)->first();
        $pdf=PDF::loadView('pdf.matterTeacher',compact('matter_user','content','teacher','today','url'));
        $pdf->download('ReportesProfesoresMaterias'.now().'.pdf');
        return $pdf->stream();
    }
    //descargar pdf de los profesores a quien coordina
    public function CoordinadorTeachers($slug){

    }
}
