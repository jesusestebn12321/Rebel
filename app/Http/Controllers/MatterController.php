<?php

namespace Equivalencias\Http\Controllers;


use Equivalencias\Http\Requests\MatterRequests;
use Illuminate\Http\Request;


use Equivalencias\contentVersion;
use Equivalencias\MatterUser;
use Equivalencias\Content;
use Equivalencias\Teacher;
use Equivalencias\Matter;
use Equivalencias\Career;
use Equivalencias\Area;
use Auth;
use input;


class MatterController extends Controller
{
 public function index()
 {

    $matter_user=MatterUser::where('user_id','=',Auth::user()->id)->first();
    $matter=Matter::paginate(10);
    $career=Career::paginate(10);
    $area=Area::all();
    $teacher=Teacher::where('user_id',Auth::user()->id)->first();
    $contentV=contentVersion::where('matter_id',$matter_user->matter_id)->get();
    return view('matter.index',compact('career','matter','matter_user','teacher','contentV'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatterRequests $request)
    {   
        $slug=str_slug($request->slug.rand());
        $matter=Matter::create([
            'slug'=>$request->slug,
            'version'=>$request->version,
            'matter'=>$request->matter,
            'semester'=>$request->semester,
            'credit'=>$request->credit,
            'ht'=>$request->ht,
            'hp'=>$request->hp,
            'hl'=>$request->hl,
            'career_id'=>$request->career_id,
            ]);

        
        return back()->with('success','<script>swal({
            title: "Exito!",
            text: "La Und. Curricular se ha creado",
            icon: "success",
        })</script>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Equivalencias\Matter  $Matter
     * @return \Illuminate\Http\Response
     */
    
    public function show($slug){
        $matter=Matter::where('slug','=',$slug)->firstOrFail();
        $content=Content::where('matter_id',$matter->id)->first();
        $matter_user=Teacher::where('user_id',Auth::user()->id)->firstOrFail();
        $teachers=MatterUser::where('matter_id',$matter->id)->get();
        return view('matter.teacher.show',compact('matter','content','matter_user','teachers'));
    }
    public function showAll($slug){
        $matter=Matter::where('slug','=',$slug)->first();
        $content=Content::where('matter_id',$matter->id)->first();
        $contentV=contentVersion::all();
        return view('matter.adminCurricular.show',compact('matter','content','contentV'));
    }


    public function showTwo($id){
        $matter=Matter::where('career_id','=',$id)->get();
        return $matter;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Equivalencias\Matter  $Matter
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $matter=Matter::where('slug',$slug)->firstOrFail();
        $content=Content::where('matter_id',$matter->id)->get();
        $career=Career::all();
        $matter_user=Teacher::where('user_id',Auth::user()->id)->firstOrFail();
        return view('matter.teacher.edit',compact('matter','content','career','matter_user'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Equivalencias\Matter  $Matter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        $matter=Matter::where('slug',$slug)->firstOrFail();
        $matter->version=2;
        $matter->matter=$request->matter;
        $matter->semester=$request->semester;
        $matter->credit=$request->credit;
        $matter->ht=$request->ht;
        $matter->hp=$request->hp;
        $matter->hl=$request->hl;
        $matter->career_id=$request->career_id;
        $matter->save();
        return back()->with('success','<script>swal({
            title: "Exito!",
            text: "La Und. Curricular se ha editado",
            icon: "success",
        })</script>');
    }
    public function updateAll(Request $request, $slug)
    {
        $matter=Matter::where('slug',$request->slug)->firstOrFail();
        $matter->version=$request->version;
        $matter->matter=$request->matter;
        $matter->semester=$request->semester;
        $matter->credit=$request->credit;
        $matter->ht=$request->ht;
        $matter->hp=$request->hp;
        $matter->hl=$request->hl;
        $matter->career_id=$request->career_id;
        $matter->save();
        for ($i=0; $i < $request->countContent; $i++) { 
            $content=Content::where('id',$request->input('contentId'.$i) )->first();
            $content->title=$request->input('title'.$content->id);
            $content->content=$request->input('content'.$content->id);
            $content->save();

        }

        return back()->with('success','<script>swal({
            title: "Exito!",
            text: "Se a editado con exito la materia y sus contenidos",
            icon: "success",
        })</script>');
    }
    public function asignarIndex(){
        $career=Career::all();
        
        $matter_user=MatterUser::where('user_id','=',Auth::user()->id)->firstOrFail();
        $matter=Matter::where('id',$matter_user->matter_id)->firstOrFail();
        $teacherAll=MatterUser::where('matter_id',$matter->id)->get();
        $teacher=Teacher::where('user_id','=',Auth::user()->id)->first();
        
        return view('matter.teacher.asignar', compact('career','matter','matter_user','teacher','teacherAll'));
    }
    public function asignarMatter(Request $request, $dni){
        $user=User::where('dni',$dni)->firstOrFail();
        $teacher=Teacher::where('user_id',$user->id)->firstOrFail();
        $matter_user=MatterUser::create([
            'matter_id'=>$request->matter_id,
            'user_id'=>$teacher->id
            ]);
        return back()->with('success','<script>swal({
            title: "Exito!",
            text: "Unidad curricular asignada con exito.",
            icon: "success",
        })</script>');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \Equivalencias\Matter  $Matter
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {   
        $matter=Matter::where('slug',$slug)->firstOrFail();
        $matter->delete();
        return back()->with('success','<script>swal({
            title: "Exito!",
            text: "La Und. Curricular se ha eliminado",
            icon: "success",
        })</script>');
        
    }
}
