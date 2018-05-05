<?php

namespace App\Http\Controllers\Admin;
use Log;
use Illuminate\Http\Request;
use App\Http\Requests\SavePostRequest;
use App\Http\Controllers\Controller;
use App\Repository\PostRepository;
use App\Models\Post;
use App\Models\CatePost;
use App\Models\Slug;
use App\Models\CTPost;
use DB;
use Image;
use File;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    public function index(){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");

        // Get all category 
        $posts = PostRepository::GetAll();
        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
        return view('admin.post.list', compact('posts'));
    }
    public function create(){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");

        // lấy ra model mẫu
        $model = new Post();
        $modelSlug = new Slug();
        $modelSlug->entity_type = $model->entityType;
        $modelSlug->entity_id = $model->id;
        $listCate = CatePost::all();
        $listCate = get_options($listCate);

        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
        return view('admin.post.form', compact('model', 'listCate', 'modelSlug'));
    }

    public function update($id){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");
        $model = Post::find($id);
        if(!$model){
            Log::info('END ' 
                . get_class() . ' => ' . __FUNCTION__ . '()');
            return redirect()->route('404.error');
        }
        // lấy ra model mẫu
        $modelSlug = Slug::where([
            'entity_type'=> $model->entityType,
            'entity_id'=> $model->id
        ])->first();
        if(!$modelSlug){
            $modelSlug = new Slug();
            $modelSlug->entity_type = $model->entityType;
            $modelSlug->entity_id = $model->id;
        }
        $listCate = CatePost::all();
        $listCate = get_options($listCate);

        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
        return view('admin.post.form', compact('model', 'listCate', 'modelSlug'));
    }

    public function save(SavePostRequest $rq){
        if($rq->subject == 0)
        {
            $post = $rq->all();
            $rl = CTPost::where('post_id',$rq->id)->get();
            foreach ($rl as $key => $value) {
            $postrl = CTPost::where('category_id',$value->category_id)->get();
            }
            $view = 1;
            $date = date('Y-m-d');
            return View('client.post.single',compact('post','view','date','postrl'));
        }
        else
        {                
        $result = PostRepository::Save($rq);
        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
        if($result){
            return redirect(route('post.list'));
        }else{
            return 'Lỗi vui lòng thử lại';
        }
    }

}

public function remove(Request $rq){
    Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");
    foreach ($rq->id as $key => $value) {
     $model = Post::find($value);
     if(!$model){
        Log::info('END ' 
            . get_class() . ' => ' . __FUNCTION__ . '()');
        return redirect()->route('404.error');
    }
    $result = PostRepository::Destroy($value);
}
Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");

if($result){
    return redirect(route('post.list'));
}else{
    return 'Lỗi vui lòng thử lại';
}
}
    public function delete($id){
        Log::info('BEGIN ' 
            . get_class() . ' => ' . __FUNCTION__ . '()');

        $model = Post::find($id);
        // begin transaction
        DB::beginTransaction();
        // try
        try{
            $model->delete();
            DB::commit();
            // neu k co loi thi tien hanh return true
            Log::info('END ' 
            . get_class() . ' => ' . __FUNCTION__ . '()');
           return redirect()->route('post.list');

        // catch     
        }catch(\Exception $ex){
            // neu xay ra loi thi return false
            Log::error('END ' 
            . get_class() . ' => ' . __FUNCTION__ . '() - ' . $ex->getMessage());
            DB::rollback();
            return 'Lỗi vui lòng thử lại';
        }   
    }
}
