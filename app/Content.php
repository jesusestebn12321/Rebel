<?php

namespace Equivalencias;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table='contents';
    protected $fillable = ['id','slug','purpose','methodology','evaluation','justification','version','content','matter_id'];
 
    public function matters(){
    	return $this->belongsTo(Matter::class,'matter_id');
    }
    public function contentVersion(){
    	return $this->hasMany(ContentVersion::class,'content_id');
    }

}
