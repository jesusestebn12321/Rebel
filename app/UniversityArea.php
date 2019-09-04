<?php

namespace Equivalencias;

use Illuminate\Database\Eloquent\Model;

class UniversityArea extends Model
{
    protected $table='university_areas';
    protected $fillable = ['id','slug', 'university_id','address_id'];
    public function address(){
    	return $this->belongsTo(Address::class,'address_id');
    }
}
