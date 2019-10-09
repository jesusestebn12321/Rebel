<?php

namespace Equivalencias;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table='teachers';
    protected $fillable = ['id','slug','user_id','type','admin_confirmed'];
    public function user(){
    	return $this->belongsTo(User::class,'user_id');
    }
    public function matter(){
    	return $this->hasMany(MatterUser::class,'user_id');
    }
    
    
}
