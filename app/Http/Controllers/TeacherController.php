<?php

namespace Equivalencias\Http\Controllers;

use Equivalencias\Teacher;
use Equivalencias\MatterUser;
use Equivalencias\Matter;
use Equivalencias\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $teacher=teacher::all();
        return view('users.teacher.index',compact('teacher'));
    }
    public function indexCoordinador(){
        $teacher=teacher::where('rol_id',5)->get();
        $matter=Matter::all();
        return view('users.teacher.coordinador',compact('teacher','matter'));
    }
    public function coordinadorRemove($slug){
        $teacher=teacher::where('slug',$slug)->first();
        $teacher->rol_id=2;
        $teacher->save();
        return back()->with('success','<script>swal({
            title: "Exito!",
          text: "Al remover el cargo",
          icon: "success",
      })</script>');
    }
    public function coordinadorAdd(Request $request){
        try {
            $user=User::where('dni',$request->dni)->where('rol_id',2)->firstOrFail();
            $slug=str_slug($request->dni.$request->matter.'_'.rand());
            $teacher=Teacher::create([
                'slug'=>$slug,
                'user_id'=>$user->id,
                'rol_id'=>5,
                'admin_confirmed'=>true,
            ]);
            $slug=str_slug($request->dni.$request->matter.'_'.rand());
            $matterUser=MatterUser::create([
                'slug'=>$slug,
                'user_id'=>$user->id,
                'matter_id'=>$request->matter_id,
                ]);
            return back()->with('success','<script>swal({
                title: "Exito!",
              text: "Al crear un nuevo coordinador",
              icon: "success",
          })</script>');
            
        } catch (Illuminate\Database\QueryException $e) {
            return back()->with('success','<script>swal({
            title: "Error!",
          text: "Se produjo un error al agregar a este coordinador, chequee los datos.",
          icon: "error",
      })</script>');
        }
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Equivalencias\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show($slug){
        $teacher=Teacher::where('slug',$slug)->first();
        $matter_teacher=MatterUser::where('user_id',$teacher->user->id)->get();
        return view('users.teacher.show',compact('teacher','matter_teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Equivalencias\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Equivalencias\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Equivalencias\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
