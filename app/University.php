<?php

namespace Equivalencias;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $table='universities';
    protected $fillable = ['id','slug', 'university','address_id'];
    public function address(){
    	return $this->belongsTo(Address::class,'address_id');
    }
    public function areas(){
    	return $this->hasMany(Area::class,'university_id');
    }
}
