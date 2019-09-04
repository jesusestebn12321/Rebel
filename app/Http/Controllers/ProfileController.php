<?php

namespace Equivalencias\Http\Controllers;

use Auth;
use Hash;
use Equivalencias\User;
use Equivalencias\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //
    }
    public function update(ProfileRequest $request){
        if (Hash::check($request->mypassword, Auth::user()->password)){
            $user = new User;
            $user->where('email', '=', Auth::user()->email)
                ->update(['password' => bcrypt($request->password)]);
            return back()->with('status', 'Password cambiado con éxito');
        }
        else{
            return back()->with('messages', 'Credenciales incorrectas');
        }
    }
}
