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
    public function getTopPost($limit){
        $posts = Post::where('category_id', $this->id)->orderBy('top','DESC')->limit($limit)->get();
        return $posts;
    }
    public function getpost()
    {
            if($this->parent_id == 0){
                    $sub = CatePost::where('parent_id', $this->id)->get();
                    if(count($sub) > 0){
                         $array = $this->id.',';
                        foreach ($sub as $term){
                            $array .= $term->id . ',';
                        }
                        $array = rtrim($array, ',');
                        $array = explode(',', $array);
                        //dd($array);
                        $ctposts = Post::whereIn('category_id', $array)->orderBy('top','DESC')->get();
                        //dd($product);
                    }else{
                        $ctposts = Post::where('category_id', $this->id)->orderBy('top','DESC')->get();
                    }
                }else{
                    $ctposts = Post::where('category_id', $this->id)->orderBy('top','DESC')->get();
                }
    return $ctposts;
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
    public function childss()
    {
        $cate = CatePost::where('parent_id',$this->id)->orderBy('id')->get();
        return $cate;
    }
}
