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
        return view('auth.users.estudent',compact('user'));
    }
    public function indexTeacher(){   
        $user=MatterUser::all();
        return view('auth.users.teachers',compact('user'));
    }

    public function profile(){
        $matter_user=MatterUser::where('user_id','=',Auth::user()->id)->first();
        if (count($matter_user)) {
            # code...
            return view('auth.profile.index',compact('matter_user'));
        } else {
            # code...
            return view('auth.profile.create');
        }
        
    }
    public function show($slug){
        $career=Career::where('slug',$slug)->first();
        $matter=Matter::where('career_id',$career->id)->get();
        $matter_user=MatterUser::all();
        return view('career.teacherMatterShow',compact('matter_user','matter','career'));
    }
    public function store(Request $request){

    }
    public function update(Request $request, $id)
    {
    }
    public function destroy($id)
    {
        //
    }
}
