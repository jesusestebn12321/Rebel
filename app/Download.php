<?php

namespace Equivalencias;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    protected $table='downloads';
    protected $fillable = ['id','slug','user_id','last_student','start_student', 'status','user_agent'];

    public function user(){
    	return $this->belongsTo(User::class,'user_id');
    }

}
