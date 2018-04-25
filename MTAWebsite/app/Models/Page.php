<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    protected $table = 'page';
    public $entityType = ENTITY_TYPE_PAGE;
    protected $fillable = ['title','content','seo_title','seo_content','index','view','parent_id'];
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
