<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\PageViewCounter\Traits\HasPageViewCounter;
class Post extends Model
{	
	use HasPageViewCounter;
    protected $table = 'post';
    public $entityType = ENTITY_TYPE_POST;
    public $fillable = ['title', 'content','category_id','seo_title','seo_content','tag'];

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
	public function link()
	{
		if($this->status == "off")
		{
			return $this->getSlug();
		}
		else
		{
			$link = 'uploads/'.$this->file;
			return $link;
		}
	}
}
