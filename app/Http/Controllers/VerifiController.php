<?php

namespace Equivalencias\Http\Controllers;

use Illuminate\Http\Request;
use Equivalencias\MatterUser;
use Equivalencias\Download;
use Equivalencias\Teacher;
use Equivalencias\User;
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

        return redirect('/')->with('notification', 'Has confirmado correctamente tu correo!');
    }
    public function AdminVerify($slug){
        
        $teacher = Teacher::where('slug',$slug)->firstOrFail();
        if ($teacher->admin_confirmed==1) {
            # code...
            $teacher->admin_confirmed = false;
            $message='<script>swal({
            title: "Exito!",
            text: "Se le removio la verificacion al usuario",
            icon: "success",
        })</script>';
        } else {
            # code...
            $teacher->admin_confirmed = true;
            $message='<script>swal({
            title: "Exito!",
            text: "Usuario Verificado Por el Administrador",
            icon: "success",
        })</script>';
            
        }
        $teacher->save();
        

        return back()->with('success',$message);
    }
    
    public function verifyEquivalencia($slug){
        $download=Download::where('slug',$slug)->first();        
        return view('verifi.equivalencia',compact('download'));

    }
}
