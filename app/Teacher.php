<?php

namespace Equivalencias;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
class Teacher extends Model
{
    protected $table='teachers';
    protected $fillable = ['id','slug','user_id','rol_id','admin_confirmed','matter_id'];
    public function user(){
    	return $this->belongsTo(User::class,'user_id');
    }
    public function matters(){
    	return $this->belongsTo(Matter::class,'user_id');
    }
    private function checkIfUserHasRole($need_role){
        return (strtolower($need_role) == strtolower($this->rol_id)) ? true : null;
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
    
    
}
