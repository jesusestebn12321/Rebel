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
    public function script_paginacion(){
        $script='<script type="text/php">
            if ( isset($pdf) ) {
                $x = 72;
                $y = 810;
                $text = "Pagina {PAGE_NUM} de {PAGE_COUNT}";
                $font = $fontMetrics->get_font("monospace");
                $size = 8;
                $color = array(0,0,0);
                $word_space = 0.0;  //  default
                $char_space = 0.0;  //  default
                $angle = 0.0;   //  default
                $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
            }
        </script>';
        return $script;
    }
    
    public function salto_linea_palabra($campo,$caracteres){
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
                $x= $x.' '.$item.'<br>';
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
    public function salto_linea_caracters($model,$range=50){
        $long_str=strlen($model);
        $div=round($long_str/$range)-1;
        $palabra='';
        $corte='';
        $count=0;
        $x=0;
        $str=str_split($model);
        for ($i=0;$i<count($str);$i++) { 
            if($count==20){

                $recomponer=explode(' ', $palabra);
                $palabra_completa=$recomponer[0].' '.$recomponer[1];
                $corte=$palabra_completa.'<br>'.$str[$i];
                $palabra=$corte;
                $x++;   
                $count=0;

            }if($i==55){
                dd($corte,$palabra_completa,$recomponer,$palabra,$model,$count);
            }
            else{
                $palabra=$palabra.$str[$i];
                $count++;
            }
        }
        dd($long_str,$count,$palabra); 
        return $palabra;
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
                            $contentP=$this->salto_linea_palabra($item_version->content,20);
                            $justification=$this->salto_linea_palabra($item_version->justification,20);
                            $purpose=$this->salto_linea_palabra($item_version->purpose,20);

                            $contenidos_paginados[$i]=array('content' => $contentP,'justification'=> $justification,'purpose'=>$purpose );


                        }
                    }
                }
            }if($content){
                $contents[$i]=Arr::add($content,$i,null);

                $contentP=$this->salto_linea_palabra($content->content,20);
                $justification=$this->salto_linea_palabra($content->justification,20);
                $purpose=$this->salto_linea_palabra($content->purpose,20);

                //$x=$this->salto_linea_caracters($content->content,50);

                //con esto guardo de donde fue descargada la equivalencia $_SERVER['HTTP_USER_AGENT']);
                $contenidos_paginados[$i]=array('content' => $contentP,'justification'=> $justification,'purpose'=>$purpose );

            }
            $i++;
        }
        $contenidos_paginados=Collection::make($contenidos_paginados);
        $download=$this->createRegisterDownload($request);
        $script=$this->script_paginacion();
        $today=Carbon::now();

        if($download==false){
            return redirect()->route('home')->with('messages','No completo el reCatcha');
        }else{
            $url=url('/VerificarEquivalencia/{'.Auth::user()->id.'}/');
            $pdf=PDF::loadView('pdf.equivalencia',compact('contents','contenidos_paginados','today','url','script'))->setOptions(['dpi' => 200, 'defaultFont' => 'sans-serif','isPhpEnabled'=>true]);

            $pdf->download('Equivalencia_'.Auth::user()->dni.'_'.now().'.pdf');
            return $pdf->stream('Equivalencia_'.Auth::user()->dni.'_'.now().'.pdf');
        }
    }
    //descargar pdf de los profesores
    public function adminTeacher(){
        $teacher=Teacher::all();
        $today = Carbon::now();
        $url=url('/Teacher');
        $pdf=PDF::loadView('pdf.teacherAll',compact('teacher','today','url'));
        $pdf->download('ReportesDeLosTeacher'.now().'.pdf');
        return $pdf->stream();
    }
    //descargar pdf de las materias
    public function adminMatter(){
        $matter=Matter::all();
        $today = Carbon::now();
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
        $script=$this->script_paginacion();

        $today = Carbon::now();
        $url=url('/Areas');
        $pdf=PDF::loadView('pdf.areaAll',compact('corte','area','pdf','today','url','script'))->setOptions(['dpi' => 200, 'defaultFont' => 'sans-serif','isPhpEnabled'=>true]);
        $pdf->download('ReportesDeLasAreas.pdf');
        return $pdf->stream();
    }
    public function adminCareer(){
        $career=Career::all();
        $today = Carbon::now();
        $url=url('/Careers');
        $pdf=PDF::loadView('pdf.careerAll',compact('career','today','url'));
        $pdf->download('ReportesDeLasCarreras'.now().'.pdf');
        return $pdf->stream();
    }
    //descargar pdf materias y contenido de la materias del profesor correspondiente
    public function teacherMatter($slug){
        $teacher=Teacher::where('user_id',Auth::user()->id)->first();
        $today = Carbon::now();
        $url=url('/VerificarDescargaProfesor/'.Auth::user()->id);
        $matter_user=MatterUser::where('user_id',Auth::user()->id)->first();
        $pdf=PDF::loadView('pdf.matterTeacher',compact('matter_user','content','teacher','today','url'));
        $pdf->download('ReportesProfesoresMaterias'.now().'.pdf');
        return $pdf->stream();
    }
    //descargar pdf de los profesores a quien coordina
    public function CareerPublic($slug){
        $area=Area::where('slug',$slug)->first();
        $json=Career::where('area_id',$area->id)->get();
        return $json;
    }
    public function ContentPublic(Request $request){
        //area_public_slug;
        //career_public_slug;
        $career=Career::where('slug',$request->career_public_slug)->first();
        $matter=Matter::where('career_id',$career->id)->get();
        $i=0;
        foreach ($matter as $key => $item) {
            # code...

            $content=Content::where('matter_id',$item->id)->first();
            if($content){
                //dd($content);
                $contents[$i]=Arr::add($content,$i,null);
                $contentP=$this->salto_linea_palabra($content->content,20);
                $justification=$this->salto_linea_palabra($content->justification,20);
                $purpose=$this->salto_linea_palabra($content->purpose,20);
                
                $contenidos_paginados[$i]=array('content' => $contentP,'justification'=> $justification,'purpose'=>$purpose );
                $i++;
            }
        }
        $script=$this->script_paginacion();

        $contenidos_paginados=Collection::make($contenidos_paginados);

        $today = Carbon::now();
        $url=url('/ContentPublicVerifi/'.$request->career_public_slug);//aqui se va a filtrar por una vista las materias pertenecientes a esa carrera
        
        $pdf=PDF::loadView('pdf.contentPublic',compact('contenidos_paginados','matter','pdf','today','url','script'))->setOptions(['dpi' => 200, 'defaultFont' => 'sans-serif','isPhpEnabled'=>true]);
        $pdf->download('ContenidosPublicos.pdf');
        return $pdf->stream();


    }
}
