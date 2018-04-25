<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CTPost extends Model
{
    //
    protected $table = 'chitiet';
    protected $fillable =['post_id','category_id'];
    public $timestamps = false;
    public function getpost()
    {
    	return $this->belongsTo('App\Models\Post', 'post_id');
    }
}
