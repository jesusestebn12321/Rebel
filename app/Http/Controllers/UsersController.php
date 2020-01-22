<?php

namespace Equivalencias\Http\Controllers;

use Illuminate\Http\Request;
use Equivalencias\StudentMatter;
use Equivalencias\MatterUser;
use Equivalencias\University;
use Equivalencias\Teacher;
use Equivalencias\Matter;
use Equivalencias\Career;
use Equivalencias\User;
use Equivalencias\Area;
use Auth;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user=User::where('rol_id','2')->get();
        return view('users.student.index',compact('user'));
    } 
    
    public function profile(){
        return view('profile.index', compact('university','teacher','matter_user'));
    }

    public function showTeacher($slug){
        $career=Career::where('slug',$slug)->first();
        $matter=Matter::where('career_id',$career->id)->firstOrFail();
        $matter_user=Teacher::where('matter_id',$matter->id)->get();
        return view('career.showTeacherMatterUser',compact('matter_user','matter','career'));
    }

    public function showStudent($slug){
        $user=User::where('slug',$slug)->first();
        $matter_student=StudentMatter::where('user_id',$user->id)->get();
        return view('users.student.show',compact('user','matter_student'));
    }
    
    public function store(Request $request){

    }
    public function update(Request $request, $slug){
        $user=User::where('slug',$slug)->firstOrFail();
        $user->name=$request->name;
        $user->lastname=$request->lastname;
        $user->save();
        return back()->with('success','Exito al editar sus datos personales');
    }
    public function Supdate(Request $request,$slug){
        $user=User::where('id',$request->id)->firstOrFail();
        $user->name=$request->name;
        $user->dni=$request->dni;
        $user->lastname=$request->lastname;
        $user->save();
        return back()->with('success','Exito al editar sus datos personales');
    }
    public function destroy($slug)
    {
        $user=User::where('slug',$slug)->firstOrFail();
        $user->delete();
        return back()->with('success','Se a borrado con exito el usuario');
    }
}
