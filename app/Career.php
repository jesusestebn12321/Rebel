<?php

namespace Equivalencias;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $table='careers';
    protected $fillable = ['id','slug','career','modalidad','area_id'];
   	public function area(){
    	return $this->belongsTo(Area::class,'area_id');
    }
    public function matter(){
    	return $this->hasMany(Matter::class,'career_id');
    }
}
