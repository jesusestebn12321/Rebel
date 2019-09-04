<?php

namespace Equivalencias;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table='areas';
    protected $fillable = ['id','slug','area','address_id','university_id'];

    public function university(){
        return $this->belongsTo(University::class,'university_id');
    }
    public function careers(){
        return $this->hasMany(Career::class,'area_id');
    }
   	public function address(){
    	return $this->belongsTo(Address::class,'address_id');
    }
}
