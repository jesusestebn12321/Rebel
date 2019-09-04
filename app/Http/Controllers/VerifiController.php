<?php

namespace Equivalencias\Http\Controllers;

use Illuminate\Http\Request;
use Equivalencias\User;
use Equivalencias\MatterUser;
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
        $user = User::where('slug','=',$slug)->first();

        $matter_user = MatterUser::where('user_id',$user->id)->first();
        $matter_user->admin_confirmed = true;
        $matter_user->save();
        return back();
    }
}
