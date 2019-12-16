<?php

namespace Equivalencias\Http\Controllers;

use SimpleSoftwareIO\QrCode\BaconQrCodeGenerator;
use Equivalencias\MatterUser;
use Equivalencias\University;
use Illuminate\Http\Request;
use Equivalencias\Download;
use Equivalencias\Career;
use Equivalencias\Area;
use Carbon\Carbon;
use QrCode;
use Auth;
use PDF;
use url;
class DownloadController extends Controller
{
    //descargar pdf Equivalencias para los estudiantes 
    public function equivalenciaStudents($slug){

    }
    
    //descargar pdf de los profesores
    public function adminTeacher(){
        $teacher=Teacher::all();
        $today = Carbon::now()->format('l jS \\of F Y h:i:s A');
        $pdf=PDF::loadView('pdf.areaAll',compact('teacher','today'));
        $pdf->download('Reportes_De_Los_Profesores_y_Las_Profesoras.pdf');
        return $pdf->stream();
    }
    
    //descargar pdf de las materias
    public function adminMatters(){
        $matter=Matter::all();
        $today = Carbon::now()->format('l jS \\of F Y h:i:s A');
        $pdf=PDF::loadView('pdf.areaAll',compact('matter','today'));
        $pdf->download('Reportes_De_Las_Materias.pdf');
        return $pdf->stream();   
    }
    
    //descargar pdf careras 
    public function adminArea(){
        $area=Area::all();
        $today = Carbon::now()->format('l jS \\of F Y h:i:s A');
        $pdf=PDF::loadView('pdf.areaAll',compact('area','today'));
        $pdf->download('ReportesDeLasAreas.pdf');
        return $pdf->stream();
    }

    public function QRContents(Request $request){ 
        $today=Carbon::now()->format('l jS \\of F Y h:i:s A');
        $slug=str_slug(Auth::user()->id.'_'.$today.'_'.rand());
        $download=Download::create([
            'slug'=>$slug,
            'user_id'=>Auth::user()->id,
            'start_student'=>$request->start_student,
            'last_student'=>$request->last_student,
            'status'=>true
            ]);
        $area=Area::all();
        $university=University::find(1);
        $matter_user=MatterUser::where('user_id',Auth::user()->id)->get();
        
        $urlConfir=url('').'/CodigoQEverificarPDF/'.$download->slug;
        
        //$pdf=PDF::loadView('QR.pdfContentQR',compact('university','matter_user','today','urlConfir','download','area'));
        //$matter



        return View('QR.pdfContentQR',compact('university','matter_user','today','urlConfir','download','area'));

        $pdf->download('Reporte_De_Los_Contenidos_'.Auth::user()->dni.'.pdf');
        
        return $pdf->stream();
    }

    //descargar pdf careras 
    public function adminCareers(){
        $career=Career::all();
        $pdf=PDF::loadView('pdf.layouts.app');
        return $pdf->download('tuto.pdf');
    }
    //descargar pdf materias y contenido de la materias del profesor correspondiente
    public function teacherMatter($slug){

    }
    //descargar pdf de los profesores a quien coordina
    public function CoordinadorTeachers($slug){

    }
}
