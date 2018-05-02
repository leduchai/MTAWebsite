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
use App\Models\CTPost;
use App\Models\Customer;
use App\Models\Contract;
use DB;
class HomeController extends Controller
{
    //
    public function index()
    {   

        return View('client.index');
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
        $rl = CTPost::where('post_id',$post->id)->get();
        foreach ($rl as $key => $value) {
            $postrl = CTPost::where('category_id',$value->category_id)->get();
        }
        $view = $post->getPageViews();
        $date = $post->created_at;
        return view('client.post.single', compact('post','cateP','postrl','view','date'));
        case ENTITY_TYPE_PAGE: // Slug dai dien cho 1 bai viet
        $pages = Page::find($model->entity_id);
        if (!$pages) {
           return redirect()->route('404.error');
       }
       $contracts =Contract::all();
        $view = $pages->getPageViews();
        $date = $pages->created_at;
       return View($pages->view,compact('pages','contracts','view','date'));
       case ENTITY_TYPE_PRODUCT:
       $product = Product::find($model->entity_id);
       $cate = Category::find($product->cate_id);
       $productrls =  Product::where([['cate_id',$cate->id],['id','!=',$product->id]])->limit(6)->get();
       return View('client.product.single',compact('product','cate','productrls'));
       case ENTITY_TYPE_CATE_PRODUCT:
       $cate  = Category::find($model->entity_id);

       if($cate->parent_id == 0){
        $sub = Category::where('parent_id',$cate->id)->get();
        if(count($sub) > 0){
            $array = '';
            foreach ($sub as $term){
                $array .= $term->id . ',';
            }
            $array = rtrim($array, ',');

            $array = explode(',', $array);
                        //dd($array);
            $products = Product::whereIn('cate_id', $array)->paginate(10);
                        //dd($product);
        }else{
            $products = Product::where('cate_id', $cate->id)->paginate(10);

        }
    }else{
        $products = Product::where('cate_id', $cate->id)->paginate(10);
    }

    $cateP = Category::all();
    return View('client.product.category',compact('products','cateP','cate'));
    case ENTITY_TYPE_CATE_POSTS:
    $cate  = CatePost::find($model->entity_id);
    $catePost = CatePost::find($cate->id);

    if($catePost)
    {
        if($catePost->parent_id == 0){
            $sub = CatePost::where('parent_id', $cate->id)->get();
            if(count($sub) > 0){
                $array = '';
                foreach ($sub as $term){
                    $array .= $term->id . ',';
                }
                $array = rtrim($array, ',');

                $array = explode(',', $array);
                        //dd($array);
                $ctposts = CTPost::whereIn('category_id', $array)->paginate(10);
                        //dd($product);
            }else{
                $ctposts = CTPost::where('category_id', $cate->id)->paginate(10);
            }
        }else{

            $ctposts = CTPost::where('category_id',$cate->id)->paginate(10);

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
    $product = Product::where('name','LIKE','%'.$keywords.'%')->get();
    $post = Post::where('title','LIKE','%'.$keywords.'%')->get();
    return View('client.search',compact('keywords','product','post'));
}
public function category()
{
    $products = Product::paginate(12);
    $cateP = Category::all();
    return View('client.product.category',compact('products','cateP'));
}
public function customer()
{
    $customers = Customer::paginate(12);
    $cateP = Category::all();
    return View('client.customer',compact('customers','cateP'));
}
public function post()
{
    $posts = Post::paginate(12);
    $cateP = Category::all();
    return View('client.post.category',compact('posts','cateP'));
}

}
