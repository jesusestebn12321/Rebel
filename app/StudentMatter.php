<?php

namespace Equivalencias;

use Illuminate\Database\Eloquent\Model;

class StudentMatter extends Model
{
    //
     protected $table='student_matters';
    protected $fillable = ['id','matter_id','version','user_id','created_at','updated_at'];
   	public function user(){
    	return $this->belongsTo(User::class,'user_id');
    }
    public function matter(){
    	return $this->belongsTo(Matter::class,'matter_id');
    }
}
