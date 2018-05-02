<?php 
use App\Models\Banner;
use App\Models\CatePost;
use App\Models\CTPost;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Product;
define('UPLOAD_IMAGE_POST','uploads/post-');
define('UPLOAD_IMAGE_PAGE','uploads/page-');
define('UPLOAD_IMAGE_PAGE1','uploads/page1-');
define('ROLE_MODERATOR', 500);
define('ROLE_ADMIN', 900);
define('ROLE_UPLOADER', 100);
/**
 * Slug Constant
 */
define('ENTITY_TYPE_CATE_POSTS', 500);
define('ENTITY_TYPE_CATE_PRODUCT', 100);
define('ENTITY_TYPE_POST', 400);
define('ENTITY_TYPE_PRODUCT', 200);
define('ENTITY_TYPE_PAGE', 300);
if(!function_exists('get_options')){

  function get_options($array, $parent=0, $indent="", $forget = null) {
      
      // Return variable
      $return = [];
      for ($i=0; $i < count($array); $i++) {
          $val = $array[$i];

        	if($val->parent_id == $parent && $val->id != $forget) {
          	$return["x".$val->id] = $indent.$val->title;
          	$return = array_merge($return, get_options($array, $val->id, "--".$indent, $forget));
          }
      }
      return $return;
  }
}
function showCategories($data)
{  
  $category = array();
    // xu ly lat ta ca nhung thang cha lon nhat
    // levl 0 con thu nhat
    foreach ($data as $key => $value) {
        if($value['parent_id'] == 0){
            $category[] = $value;
            unset($data[$key]);
        }
    }

    // level 1 con thu 2
    foreach ($data as $k => $item) {
        foreach ($category  as $k2 => $val) {
            if($val['id'] == $item['parent_id']){
                $category[$k2]['lstCat'][] = $item;
                unset($data[$k]);
            }
        }
    }

    // level 2 con thu 3
    foreach ($data as $k => $item)
    {
        foreach ($category  as $k2 => $sub)
        {
            if(isset($sub['lstCat'])){
                foreach ($sub['lstCat'] as $k3 => $v) {
                    // kiem tra xem con thang con nao ben trong hay ko
                    if($v['id'] == $item['parent_id']){
                        $category[$k2]['lstCat'][$k3]['ltsSubCat'][] = $item;
                        unset($data[$k]);
                    }
                }
            }
        }
    }

    return $category;   
}
if(!function_exists('setting')){

  function setting() {
      
      // Return variable
      $data = Setting::first();
      return $data;
  }
}
if(!function_exists('banners')){

  function banners($keyword) {
      
      // Return variable
      $data = '';
      $data = Banner::where('location',$keyword)->get();
      return $data;
  }
}
if(!function_exists('slug_generate')){
  function slug_generate($name){
    $slug = null;
    $slug = str_slug(trim($name), '-');
    $slug .= "-" . date('YmdHis', time());
    return $slug;
  }
}
if(!function_exists('showpost')){
  function showpost($id){

    $catePost = CatePost::find($id);
    if($catePost)
    {
    if($catePost->parent_id == 0){
                    $sub = CatePost::where('parent_id', $id)->get();
                    if(count($sub) > 0){
                        $array = '';
                        foreach ($sub as $term){
                            $array .= $term->id . ',';
                        }
                        $array = rtrim($array, ',');
                        
                        $array = explode(',', $array);
                        //dd($array);
                        $ctposts = CTPost::whereIn('category_id', $array)->get();
                        //dd($product);
                    }else{
                        $ctposts = CTPost::where('category_id', $id)->get();
                    }
                }else{
                    $ctposts = CTPost::where('category_id', $id)->get();
                }
    return $ctposts;
  }
  else
  {
    $ctposts = array();
    return  $ctposts;
  }
  }
}
if(!function_exists('showproduct')){
  function showproduct($id){
    $catePost = Category::find($id);
    if($catePost->parent_id == 0){
                    $sub = Category::where('parent_id', $id)->get();
                    if(count($sub) > 0){
                        $array = '';
                        foreach ($sub as $term){
                            $array .= $term->id . ',';
                        }
                        $array = rtrim($array, ',');
                        
                        $array = explode(',', $array);
                        //dd($array);
                        $ctposts = Product::whereIn('cate_id', $array)->paginate(10);
                        //dd($product);
                    }else{
                        $ctposts = Product::where('cate_id', $id)->paginate(10);
                    }
                }else{
                    $ctposts = Product::where('cate_id', $id)->paginate(10);
                }
    return $ctposts;
  }
}

 ?>