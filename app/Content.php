<?php

namespace Equivalencias;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table='contents';
    protected $fillable = ['id','slug','title','introdution','version','content','matter_id'];
 
    public function matters(){
    	return $this->belongsTo(Matter::class,'matter_id');
    }
}
