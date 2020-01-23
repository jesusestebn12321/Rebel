<?php

namespace Equivalencias\Http\Controllers\Auth;

use Equivalencias\User;
use Equivalencias\Area;
use Equivalencias\Career;
use Equivalencias\Mail\VerificationEmail;
use Carbon\Carbon;
use Mail;
use Equivalencias\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str as Str;
use Equivalencias\Rules\Captcha;

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
    protected $redirectTo = '/';

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
            'rol' => 'required|in:teacher,students',
            'dni'      => 'required|integer|min:1|unique:users,dni',
            'g-recaptcha-response' => new Captcha()
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
        $data['confirmation_code']= ''.$slug.'-token='.rand().'-'.str_random(30).rand().'_'.str_random(30).'-Rebel';
        
        $e=$data['email'];
        $dominio=explode('@', $e, 2);
        //dd($dominio);
        if($dominio[1]=='unerg.edu.ve' && $data['rol']=="teacher"){
            $data['rol']=2;
            //dd($data);
        }else{
            $data['rol']=3;
        }
        
        $mail=Mail::send('emails.confimation_code', $data, function($message) use ($data) {
            $message->from($data['email'],'Rebel');
            $message->to($data['email'], $data['name'])->subject('Por favor confirma tu correo, para poder iniciar seccion en el sistema Rebel');
        });
        

        $user= User::create([
            'name'      => $data['name'],
            'dni'       => $data['dni'],
            'lastname'  => $data['lastname'],
            'email'     => $data['email'],
            'slug'      => $slug,
            'password'  => bcrypt($data['password']),
            'rol_id'    => $data['rol'],
            'confirmation_code' => $data['confirmation_code']
        ]);

        return $user;
    }
}
