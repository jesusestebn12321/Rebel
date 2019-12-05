<?php

namespace Equivalencias\Http\Controllers\Auth;

use Equivalencias\User;
use Equivalencias\Area;
use Equivalencias\Career;
use Carbon\Carbon;
use Mail;
use Equivalencias\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str as Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    // public function showRegistrationForm(){
    //     $area=Area::all();
    //     $career=Career::all();
    //     return view('auth.register',compact('area','career'));
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'dni'      => 'required|integer|min:1|unique:users,dni'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Equivalencias\User
     */
    protected function create(array $data){
        //dd($data);
        $slug=str_slug($data['name'].'_'.$data['lastname'].'-'.$data['dni']);
        $data['confirmation_code']= ''.$slug.'-token='.rand().str_random(29).rand().'-Reble';
        
        $e=$data['email'];
        $dominio=explode('@', $e, 2);
        if($dominio[1]=='unerg.edu.ve' || $data['rol']=="teacher"){
            $data['rol']=2;
        }else{
            $data['rol']=3;
        }
        $user= User::create([
            'name'      => $data['name'],
            'dni'       => $data['dni'],
            'lastname'  => $data['lastname'],
            'email'     => $data['email'],
            'slug'      => $slug,
            'password'  => bcrypt($data['password']),
            'rol_id'       => $data['rol'],
            'confirmation_code' => $data['confirmation_code']
        ]);

            Mail::send('emails.confimation_code', $data, function($message) use ($data) {
            $message->from($data['email'],'curso');
            $message->to($data['email'], $data['name'])->subject('Por favor confirma tu correo');
            });
            
        return $user;
    }
}
