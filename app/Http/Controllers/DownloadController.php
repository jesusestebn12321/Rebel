<?php

namespace Equivalencias\Http\Controllers;
use Illuminate\Http\Request;

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
use Illuminate\Support\Collection;
class DownloadController extends Controller
{
    //descargar pdf Equivalencias para los estudiantes 
    public function equivalenciaStudents($slug, Request $request){

        $matter_user= StudentMatter::where('user_id',Auth::user()->id)->get();
        $i=0;

        foreach ($matter_user as $item) {
            $version=$item->version;
            $content=Content::where('version',$item->version)
                ->where('matter_id',$item->id)
                ->first();
            if (!$content) {
                foreach ($item->matter->content as $items) {
                    $content_version=contentVersion::where('content_id',$items->id)->get();
                    foreach ($content_version as $item_version) {
                        if ($item_version->version == $version) {
                            $contents[$i]=Arr::add($item_version,$i,null);
                            //dd($contents);
                        }
                    }
                }
            }if($content){
                $contents[$i]=Arr::add($content,$i,null);
            }
            $i++;
        }
        //dd($contents);
        $slug=str_slug('downloand-'.Auth::user()->id.'-'.now().'-equivalencia');
        Download::Create([
            'slug'=>$slug,
            'user_id'=>Auth::user()->id,
            'start_student'=>now(),
            'last_student'=>now(),
            'status'=>0,
            ]);
        $url=url('/VerificarEquivalencia/{'.Auth::user()->id.'}/');
        $pdf=PDF::loadView('pdf.equivalencia',compact('contents','today','url'));
        $pdf->download('Equivalencia_'.Auth::user()->dni.'_'.now().'.pdf');
        return $pdf->stream();
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
        $area=Area::all()->paginate(7);
        dd($area);
        $today = Carbon::now()->format('l jS \\of F Y h:i:s A');
        $url=url('/Areas');
        return View('QR.pdfContentQR',compact('area','today','url'));
        $pdf=PDF::loadView('pdf.areaAll',compact('area','today','url'));
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
