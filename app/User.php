<?php

namespace Equivalencias;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    
    protected $table='users';
    protected $fillable = [
       'slug','name','lastname','rol_id', 'email', 'password','last_login','confirmed','confirmation_code','dni'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    private function checkIfUserHasRole($need_role){
        return (strtolower($need_role) == strtolower(Auth::User()->rol_id)) ? true : null;
    }
    
    public function hasRole($rol){
        if (is_array($rol)) {
            foreach ($rol as $need_role){
                if ($this->checkIfUserHasRole($need_role)){
                    return true;
                }
            }
        }else {
            return $this->checkIfUserHasRole($rol);
        }
        return false;
    }
    public function rol(){
        return $this->hasMany(Rol::class,'rol_id');
    }

    public function studen_matter(){
        return $this->hasMany(StudentMatter::class,'user_id');
    }
    public function teacher(){
        return $this->hasMany(Teacher::class,'user_id');
    }
   
}
