<?php

namespace Equivalencias\Http\Controllers;

use SimpleSoftwareIO\QrCode\BaconQrCodeGenerator;
use Illuminate\Http\Request;
use Equivalencias\Career;
use Equivalencias\Area;
use PDF;
use Carbon\Carbon;
use Auth;
use url;
use QrCode;
class DownloadController extends Controller
{
    //descargar pdf Equivalencias para los estudiantes 
    public function equivalenciaStudents($slug){

    }
    //descargar pdf de los profesores
    public function adminTeacher(){

    }
    //descargar pdf de las materias
    public function adminMatters(){

    }
    //descargar pdf careras 
    public function adminArea(){
        $area=Area::all();
        $today = Carbon::now()->format('l jS \\of F Y h:i:s A');
        $pdf=PDF::loadView('pdf.areaAll',compact('area','today'));
        $pdf->download('ReportesDeLasAreas.pdf');
        return $pdf->stream();
    }
    public function QRContents(){

     
        
        $area=Area::all();
        $today = Carbon::now()->format('l jS \\of F Y h:i:s A');
        $urlConfir=url('').'/CodigoQEverificarPDF/'. Auth::user()->id;
        return View('QR.pdfContentQR',compact('area','today','urlConfir'));
        //$pdf->download('Reporte_De_Los_Contenidos_'.Auth::user()->dni.'.pdf');
        return $pdf->stream();


    }
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
