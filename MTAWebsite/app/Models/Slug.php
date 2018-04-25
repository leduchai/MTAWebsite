<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slug extends Model
{
    //
    protected $table ='slugs';
    public static function checkSlugExisted($slugUrl){
    	$model = Slug::where('slug', $slugUrl)->first();
		if($model){
			return true;
		}
		return 	false;
    }
}
