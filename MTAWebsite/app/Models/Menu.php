<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
     protected $table = 'menu';
    protected $fillable = ['title','url','index','parent_id'];
    public $timestamps = false;
    public function getParentName(){
    	if($this->parent_id == null || $this->parent_id == 0){
    		return null;
    	}
    	$parent = self::find($this->parent_id);
        if($parent)
    	   return $parent->title;
        return null;
    }
}
