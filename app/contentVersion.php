<?php

namespace Equivalencias;

use Illuminate\Database\Eloquent\Model;

class contentVersion extends Model
{
    protected $table='content_versions';
    protected $fillable = ['id','slug','purpose','methodology','evaluation','justification','version','content','content_id','matter_id'];
 
    public function contents(){
    	return $this->belongsTo(Content::class,'content_id');
    }
    public function matters(){
    	return $this->belongsTo(Matter::class,'matter_id');
    }
}
