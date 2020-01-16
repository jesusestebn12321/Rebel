<?php

namespace Equivalencias\Http\Controllers;

use Illuminate\Http\Request;
use Equivalencias\Teacher;
use Equivalencias\Matter;
use Equivalencias\Career;
use Equivalencias\Area;
use PDF;
use Carbon\Carbon;
class DownloadController extends Controller
{
    //descargar pdf Equivalencias para los estudiantes 
    public function equivalenciaStudents($slug){

    }
    //descargar pdf de los profesores
    public function adminTeacher(){
        $teacher=Teacher::all();
        $today = Carbon::now()->format('l jS \\of F Y h:i:s A');
        $url=url('/Teacher');
        $pdf=PDF::loadView('pdf.teacherAll',compact('teacher','today','url'));
        $pdf->download('ReportesDeLasAreas.pdf');
        return $pdf->stream();
    }
    //descargar pdf de las materias
    public function adminMatter(){
        $matter=Matter::all();
        $today = Carbon::now()->format('l jS \\of F Y h:i:s A');
        $url=url('/Matter');
        $pdf=PDF::loadView('pdf.teacherAll',compact('matter','today','url'));
        $pdf->download('ReportesDeLasAreas.pdf');
        return $pdf->stream();
    }
    //descargar pdf careras 
    public function adminArea(){
        $area=Area::all();
        $today = Carbon::now()->format('l jS \\of F Y h:i:s A');
        $url=url('/Areas');
        //return View('QR.pdfContentQR',compact('area','today','url'));
        $pdf=PDF::loadView('pdf.areaAll',compact('area','today','url'));
        $pdf->download('ReportesDeLasAreas.pdf');
        return $pdf->stream();
    }
    public function adminCareer(){
        $career=Career::all();
        $today = Carbon::now()->format('l jS \\of F Y h:i:s A');
        $url=url('/Careers');
        $pdf=PDF::loadView('pdf.careerAll',compact('career','today','url'));
        $pdf->download('ReportesDeLasAreas.pdf');
        return $pdf->stream();
    }
    //descargar pdf materias y contenido de la materias del profesor correspondiente
    public function teacherMatter($slug){

    }
    //descargar pdf de los profesores a quien coordina
    public function CoordinadorTeachers($slug){

    }
}
