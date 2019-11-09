<?php

namespace Equivalencias;

use Illuminate\Database\Eloquent\Model;

class contentVersion extends Model
{
    protected $table='content_versions';
    protected $fillable = ['id','slug','title','introdution','version','content','content_id'];
 
    public function content(){
    	return $this->belongsTo(Matter::class,'content_id');
    }
}
