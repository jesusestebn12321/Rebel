<?php

namespace Equivalencias\Http\Controllers;

use Illuminate\Http\Request;
use Equivalencias\User;
use Equivalencias\Career;
use Equivalencias\MatterUser;
use Equivalencias\Matter;
use Auth;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user=User::where('rol','2')->get();
        return view('auth.users.student',compact('user'));
    } 
    
    public function profile(){
        $matter_user=MatterUser::where('user_id','=',Auth::user()->id)->first();
        if ($matter_user && Auth::user()->hasRole(0)) {
            # code...
            return view('auth.profile.index',compact('matter_user'));
        } else {
            # code...
        
            return view('auth.profile.create');
        }
        
    }
    public function show($slug){
        $career=Career::where('slug',$slug)->first();
        $matter=Matter::where('career_id',$career->id)->firstOrFail();
        $matter_user=MatterUser::all();
        return view('career.teacherMatterShow',compact('matter_user','matter','career'));
    }

    public function showStudent($slug){
        $user=User::where('slug',$slug)->firstOrFail();
        $career=Career::where('slug',$slug)->first();
        $matter=Matter::where('career_id',$career->id)->firstOrFail();
        return view('auth.profile.student.show',compact('user','matter','career'));
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
    public function destroy($slug)
    {
        $user=User::where('slug',$slug)->firstOrFail();
        $user->delete();
        return back()->with('success','Se a borrado con exito el usuario');
    }
}
