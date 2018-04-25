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
        $cateP = Category::all();

        
        return view('client.post.single', compact('post','cateP','posts'));
        case ENTITY_TYPE_PAGE: // Slug dai dien cho 1 bai viet
            $pages = Page::find($model->entity_id);
            if (!$pages) {
             return redirect()->route('404.error');
         }
         return View('client.page',compact('pages'));
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


        $ctpost = showpost($cate->id);

        $cateP = Category::all();
        return View('client.post.category',compact('ctpost','cateP','cate'));
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
