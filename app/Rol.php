<?php

namespace Equivalencias;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table='rols';
    protected $fillable = ['id','rol'];
    public function user(){
    	return $this->belongsTo(User::class,'rol_id');
    }
    public function teacher(){
    	return $this->belongsTo(Teacher::class,'rol_id');
    }
}
