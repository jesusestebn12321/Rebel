<?php

namespace Equivalencias;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
	protected $table='address';
	protected $fillable = ['id','slug','addres'];
	public function univerties(){
		return $this->hasMany(University::class,'address_id');
	}
	public function areas(){
		return $this->hasMany(Area::class,'address_id');
	}
}
