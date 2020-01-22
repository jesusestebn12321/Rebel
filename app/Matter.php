<?php

namespace Equivalencias;

use Illuminate\Database\Eloquent\Model;

class Matter extends Model{
    protected $table='matters';
    protected $fillable = ['id','slug','matter','version','semester','credit','ht','hp','hl','career_id'];
   	public function career(){
    	return $this->belongsTo(Career::class,'career_id');
    }
    public function content(){
    	return $this->hasMany(Content::class,'matter_id');
    } 
    public function matter_user(){
          return $this->hasMany(MatterUser::class,'matter_id');
    } 
    public function student_matter(){
		  return $this->hasMany(StudentMatter::class,'matter_id');
	}
}
