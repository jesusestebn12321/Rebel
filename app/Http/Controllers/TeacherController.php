<?php

namespace Equivalencias\Http\Controllers;

use Equivalencias\Teacher;
use Equivalencias\MatterUser;
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
        return view('users.teacher.coordinador',compact('teacher'));
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
