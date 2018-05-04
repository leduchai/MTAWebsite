<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Slug;
use DB;
use App\Http\Requests\SavePageRequest;
use Log;
use File;
use Image;
use App\Models\Menu;
class PageController extends Controller
{
    //
    public function index()
    {
    	$page =  Page::all();
        $page = get_options($page);
        return View('admin.page.list',compact('page'));
    }
    public function create()
    {
    	$model = new Page();
        $modelSlug = new Slug();
        $modelSlug->entity_type = $model->entityType;
        $modelSlug->entity_id = $model->id;
        $listPage = Page::all();
        $listPage = get_options($listPage);
        return View('admin.page.form',compact('model','modelSlug','listPage'));
    }
    public function update($id)
    {
    	$model = Page::find($id);
        if(!$model){
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
        $listPage = Page::all();
        $listPage = get_options($listPage);
        return View('admin.page.form',compact('model','modelSlug','listPage'));

    }
    public function save(SavePageRequest $request){
      DB::beginTransaction();
      try{

         if($request->id == null){
            $model = new Page();
        }else{
            $model = Page::find($request->id);
            $menu = Menu::where('page_id',$model->id)->get();
            if(count($menu)>0)
            {
                foreach ($menu as $key => $value) {
                    $m = Menu::find($value->id);
                    $m->url = $request->slug;
                    $m->title = $request->title;
                    $m->save();
                }
            }
        }
        $model->fill($request->all());
        if($request->hasFile('upload_image')){
            $image_path = UPLOAD_IMAGE_PAGE.$model->images; 
            if(File::exists($image_path)) {
               File::delete($image_path);
           }
           $image = $request->file('upload_image');
           $filename = 'image-' . uniqid() . '.' . $image->getClientOriginalExtension();
           $path_1 = public_path(UPLOAD_IMAGE_PAGE . $filename);
           $path_2 = public_path(UPLOAD_IMAGE_PAGE1. $filename);
           Image::make($image->getRealPath())->fit(1140, 428)->save($path_1);    
           Image::make($image->getRealPath())->fit(555, 416)->save($path_2);  
           $model->images =$filename;
       }
       $model->save();
       DB::table('slugs')->where([
        ['entity_id', '=', $model->id],
        ['entity_type', '=', $model->entityType]
    ])->delete();

       DB::table('slugs')->insert(
          [
             'entity_type' => $model->entityType,
             'entity_id' => $model->id,
             'slug' => $request->slug
        ]
     ); 
       DB::commit();
       return redirect()->route('page.list');  
   }catch(\Exception $ex){
     Log::error('END ' 
         . get_class() . ' => ' . __FUNCTION__ . '() - ' . $ex->getMessage());
     DB::rollback();
     return 'Error';
 }	
}
public function remove(Request $rq){

    foreach ($rq->id as $key => $value) {
     $model = Page::find($value);
     if(!$model){
        Log::info('END ' 
            . get_class() . ' => ' . __FUNCTION__ . '()');
        return redirect()->route('404.error');
    }
    DB::beginTransaction();
		// try
    try{
        DB::table('slugs')->where([
            ['entity_id', '=', $model->id],
            ['entity_type', '=', $model->entityType]
        ])->delete();
        $model->delete();
        DB::commit();
        return redirect()->route('page.list'); 
    }catch(\Exception $ex){
     DB::rollback();
     return 'Error';
 }	
}

}
public function delete($id){


 $model = Page::find($id);
 if(!$model){
    Log::info('END ' 
        . get_class() . ' => ' . __FUNCTION__ . '()');
    return redirect()->route('404.error');
}
DB::beginTransaction();
        // try
try{
    DB::table('slugs')->where([
        ['entity_id', '=', $model->id],
        ['entity_type', '=', $model->entityType]
    ])->delete();
    $model->delete();
    DB::commit();
    return redirect()->route('page.list');

        // catch     
}catch(\Exception $ex){

    DB::rollback();
    return 'Error';
}   


}
}
