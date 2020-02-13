<?php

namespace Equivalencias\Http\Controllers;

use Equivalencias\MatterUser;
use Equivalencias\Matter;
use Equivalencias\Career;
use Equivalencias\Teacher;
use Equivalencias\User;
use Illuminate\Http\Request;
use Equivalencias\Http\Requests\MatterUserRequests;

use Auth;

class MatterUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug){
        $matter=Matter::where('slug',$slug)->first();
        $teacher=Teacher::all();
        //dd($teacher);
        return view('matter.teacher.asignarTeacherIndex',compact('teacher','matter'));
    }
    public function coordinadorIndex(){
        $teacher=User::where('rol_id',2)->get();
        $career=Career::all();
        return view('users.teacher.coordinadorIndex',compact('teacher','career'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatterUserRequests $request)
    {
        $matter_user=MatterUser::create([
                'matter_id'=>$request->matter_id,
                'user_id'=>Auth::user()->id,
            ]);
        // dd($request);
        return back()->with('success','<script>swal({
            title: "Exito!",
            text: "Lleno el perfil con exito",
            icon: "success",
        })</script>');
    }
    public function asignar($slug,$matter)
    {
        $user=User::where('slug',$slug)->first();
        $matter=Matter::where('slug',$matter)->first();
        $matter_user=MatterUser::create([
                'matter_id'=>$matter->id,
                'user_id'=>$user->id,
            ]);
        $matter_user=MatterUser::where('user_id','=',Auth::user()->id)->firstOrFail();
        $matter=Matter::where('id',$matter_user->matter_id)->firstOrFail();
        $teacherAll=MatterUser::where('matter_id',$matter->id)->get();
        $teacher=Teacher::where('user_id','=',Auth::user()->id)->first();
        
        return redirect()->route('Matter.asignar.index')->with('success','<script>swal({
            title: "Exito!",
            text: "Und. Curricular fue asignada con exito",
            icon: "success",
        })</script>');
    }
    public function add(Request $request){
        $teacher=User::where('dni',$request->user_id)->firstOrFail();
        $matter_coordinator=Teacher::where('type',$request->type)->firstOrFail();
        $matter_user=MatterUser::create([
                'matter_id'=>$request->matter_id,
                'user_id'=>$teacher->id,
                'admin_confirmed'=>true
            ]);
        return back()->with('success','<script>swal({
            title: "Exito!",
            text: "Se a añadido con exito la Und. Curricular",
            icon: "success",
        })</script>');
    }
    public function search($dni){
        
        $matter_teacher=User::where('dni',$dni)->first();
        if ($matter_teacher->rol_id==2) {
            return $matter_teacher;
        }else{
            $error='Este Usuario no es un profesor';
            return $error;
        }

    }
    public function searchMatter($id){
        $career=Career::where('id',$id)->first();
        $matter=Matter::where('career_id',$career->id)->get();
        return $matter;
    }

    /**
     * Display the specified resource.
     *
     * @param  \Equivalencias\MatterUser  $matterUser
     * @return \Illuminate\Http\Response
     */
    public function show(MatterUser $matterUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Equivalencias\MatterUser  $matterUser
     * @return \Illuminate\Http\Response
     */
    public function edit(MatterUser $matterUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Equivalencias\MatterUser  $matterUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MatterUser $matterUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Equivalencias\MatterUser  $matterUser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $matter_user=MatterUser::where('id',$id)->firstOrFail();
        $matter_user->delete();
        return back()->with('success','<script>swal({
            title: "Exito!",
            icon: "success",
        })</script>');   
    }
}
