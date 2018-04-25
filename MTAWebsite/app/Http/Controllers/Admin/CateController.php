<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log;
use App\Repository\CatePostRepository;
use App\Models\CatePost;
use App\Http\Requests\SaveCategoryRequest;
use App\Models\Slug;
class CateController extends Controller
{
    public function index(){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");
        $cates = CatePostRepository::GetAll();
        $listCate = CatePost::all();
        $listCate = get_options($listCate);
        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
        return view('admin.catepost.list', compact('cates','listCate'));
    }
    public function create(){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");
        $model = new CatePost();
        $modelSlug = new Slug();
        $modelSlug->entity_type = $model->entityType;
        $modelSlug->entity_id = $model->id;
        $listCate = CatePost::all();
        $listCate = get_options($listCate);
        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
        return view('admin.catepost.form', compact('model', 'listCate', 'modelSlug'));
    }
    public function update($id){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");
        $model = CatePost::find($id);
        if(!$model){
            Log::info('END ' 
                . get_class() . ' => ' . __FUNCTION__ . '()');
            return redirect()->route('404.error');
        }
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
        return view('admin.catepost.form', compact('model', 'listCate', 'modelSlug'));
    }
    public function save(SaveCategoryRequest $rq){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");
        $result = CatePostRepository::Save($rq);
        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
        if($result){
            return redirect(route('cate.post.list'));
        }else{
            return 'Error';
        }
    }
    public function remove(Request $rq){
    	Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");
        foreach ($rq->id as $key => $value) {
           $model = CatePost::find($value);
           if(!$model){
            Log::info('END ' 
                . get_class() . ' => ' . __FUNCTION__ . '()');
            return redirect()->route('404.error');
        }
        $result = CatePostRepository::Destroy($value);
    }
    Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");

    if($result){
        return redirect(route('cate.post.list'));
    }else{
        return 'Error';
    }
}
}
