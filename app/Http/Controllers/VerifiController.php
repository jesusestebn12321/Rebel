<?php

namespace Equivalencias\Http\Controllers;

use Illuminate\Http\Request;
use Equivalencias\User;
use Equivalencias\MatterUser;
use Equivalencias\Teacher;
use Auth;
class VerifiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('verifi')->with('message','Usuario no Verificado');
    }
    public function AdminVerifyIndex(){
        return view('adminVerify')->with('message','Usuario no Verificado Por el Administrador');
    }

    public function verify($code)
    {
        $user = User::where('confirmation_code','=',$code)->first();

        if (! $user){
            return redirect('/');
        }
        $user->confirmed = true;
        $user->confirmation_code = null;
        $user->save();

        return redirect('/home')->with('notification', 'Has confirmado correctamente tu correo!');
    }
    public function AdminVerify($slug){
        
        $teacher = Teacher::where('slug',$slug)->firstOrFail();
        if ($teacher->admin_confirmed==1) {
            # code...
            $teacher->admin_confirmed = false;
            $message='Se le removio la verificacion al usuario';
        } else {
            # code...
            $teacher->admin_confirmed = true;
            $message='Usuario Verificado Por el Administrador';
            
        }
        $teacher->save();
        

        return back()->with('success',$message);
    }
    public function verificacionPDF($id){
        $matter_user=MatterUser::where('user_id',$id)->first();
        return view('QR.verificacion',compact('matter_user'));
    }
}
