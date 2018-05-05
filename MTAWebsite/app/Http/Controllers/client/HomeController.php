<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Product;
use App\Models\CatePost;
use App\Models\Slug;
use App\Models\Page;
use App\Models\Customer;
use App\Models\Contract;
use DB;
class HomeController extends Controller
{
    //
    public function index()
    {   
        $new = CatePost::find(1);
        $noti = CatePost::find(8);
        return View('client.index',compact('new','noti'));
    }
    public function getContent($slug1,$slug2 = '')
    {   
        if($slug2 == '')
        {
            $slug = '/'.$slug1;
        }
        else
        {
            $slug = '/'.$slug1.'/'.$slug2;
        }
        $model = Slug::where('slug', $slug)->first();
        if(!$model){
          return view('404');
      }
      switch ($model->entity_type) {
        case ENTITY_TYPE_POST: 
        $post = Post::find($model->entity_id);
        $post->addPageView();

        $postrl = Post::where([['category_id',$post->category_id],['id','!=',$post->id]])->orderBy('top')->limit(9)->get();
        
        $view = $post->getPageViews();
        $date = $post->created_at;
        $cateP = CatePost::find($post->category_id);
        $sub = CatePost::where('parent_id',$cateP->id)->get();
        if(count($sub) > 0)
        {
            if($cateP->parent_id != 0)
            {

                $listCate = CatePost::find($cateP->parent_id);
                if($listCate->parent_id != 0)
                {
                   $listCate = CatePost::find($cateP->parent_id);
               }

           }
           else
           {
            $listCate = $cateP;
        }
    }
    else
    {
        if($cateP->parent_id != 0)
        {
            $listCate = CatePost::find($cateP->parent_id);

            if($listCate->parent_id != 0)
            {
               $listCate = CatePost::find($listCate->parent_id);
           }
       }
       else
       {
        $listCate = $cateP;
    }
}
return view('client.post.single', compact('post','postrl','view','date','listCate'));
        case ENTITY_TYPE_PAGE: // Slug dai dien cho 1 bai viet
        $pages = Page::find($model->entity_id);
        $pages->addPageView();
        if (!$pages) {
           return redirect()->route('404.error');
       }
       $contracts =Contract::all();
       $view = $pages->getPageViews();
       $date = $pages->created_at;
       $sub = Page::where('parent_id',$pages->id)->get();
       if(count($sub) > 0)
       {
        if($pages->parent_id != 0)
        {

            $listPage = Page::find($pages->parent_id);
            if($listPage->parent_id != 0)
            {
               $listPage = Page::find($pages->parent_id);
           }

       }
       else
       {
        $listPage = $pages;
    }
}
else
{
    if($pages->parent_id != 0)
    {
        $listPage = Page::find($pages->parent_id);

        if($listPage->parent_id != 0)
        {
           $listPage = Page::find($listPage->parent_id);
       }
   }
   else
   {
    $listPage = $pages;
}
}
return View($pages->view,compact('pages','contracts','view','date','listPage'));
case ENTITY_TYPE_CATE_POSTS:
$cate  = CatePost::find($model->entity_id);
if($cate)
{
    if($cate->parent_id == 0){
        $sub = CatePost::where('parent_id', $cate->id)->get();
        if(count($sub) > 0){
            $array = $cate->id.',';
            foreach ($sub as $term){
                $array .= $term->id . ',';
            }
            $array = rtrim($array, ',');

            $array = explode(',', $array);
                        //dd($array);
            $ctposts = Post::whereIn('category_id', $array)->paginate(8);
                        //dd($product);
        }else{
            $ctposts = Post::where('category_id', $cate->id)->paginate(8);

        }
    }else{
        $ctposts = Post::where('category_id',$cate->id)->paginate(8);
    }
}
return View('client.post.category',compact('ctposts','cate'));
default:
return view('forbidden');
break;
}
}
public function search(Request $rq)
{   
    $keywords =$rq->keywords;
    $ctposts = Post::where('title','LIKE','%'.$keywords.'%')->get();
    return View('client.search',compact('keywords','ctposts'));
}

}
