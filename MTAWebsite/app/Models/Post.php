<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    public $entityType = ENTITY_TYPE_POST;
    public $fillable = ['title', 'content','seo_title','seo_content','status'];

    public function category()
	{
	    return $this->hasMany('App\Models\CTPost', 'post_id');
	}
	public function user_create()
	{
	    return $this->belongsTo('App\User', 'author');
	}
	public function getSlug(){
		$slug = Slug::where([
				'entity_type' => $this->entityType,
				'entity_id' => $this->id
			])->first();
		if($slug){
			return $slug->slug;
		}
		return null;
	}
}
