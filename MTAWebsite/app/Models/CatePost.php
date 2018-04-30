<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Slug;
class CatePost extends Model
{
    protected $table = 'category';
    public $entityType = ENTITY_TYPE_CATE_POSTS;
    public $timestamps = false;
    public $fillable = ['title','seo_title','parent_id'];

    // public $timestamps = false;
     public function getParentName(){
    	if($this->parent_id == null || $this->parent_id == 0){
    		return null;
    	}
    	$parent = self::find($this->parent_id);
        if($parent)
    	   return $parent->title;
        return null;
    }
    public function getTopPost(){
        $posts = CTPost::where('category_id', $this->id)->get();
        return $posts;
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
