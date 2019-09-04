<?php

namespace Equivalencias;

use Illuminate\Database\Eloquent\Model;

class Matter extends Model{
    protected $table='matters';
    protected $fillable = ['id','slug','matter','career_id'];
   	public function career(){
    	return $this->belongsTo(Career::class,'career_id');
    }
    public function content(){
    	return $this->hasMany(Content::class,'matter_id');
    } 
    public function matter_user(){
		  return $this->hasMany(MatterUser::class,'matter_id');
	  }
}
