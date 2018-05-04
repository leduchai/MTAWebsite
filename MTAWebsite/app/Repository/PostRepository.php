<?php 
namespace App\Repository;
use Log;
use App\Models\Post;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Image;
use File;
class PostRepository
{
	public static function GetAll(){	
			return Post::all();		
	}

	public static function Save(Request $request){
		
		Log::info('BEGIN ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
		DB::beginTransaction();
		try{

			if($request->id == null){
				$model = new Post();
	        	$model->author = Auth::user()->id;
			}else{
				$model = Post::find($request->id);
			}
	        $model->fill($request->all());
			if($request->hasFile('upload_image')){
				$image_path = UPLOAD_IMAGE_POST.$model->images; 
					if(File::exists($image_path)) {
					    File::delete($image_path);
					}
                $image = $request->file('upload_image');
                $filename = 'image-' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $path_1 = public_path(UPLOAD_IMAGE_POST . $filename);
                    Image::make($image->getRealPath())->fit(555, 312)->save($path_1);
                    
                $model->images =$filename;
            }
            if($request->hasFile('upload_file')){
				$image_path1 = 'uploads/'.$model->file; 
					if(File::exists($image_path1)) {
					    File::delete($image_path1);
					}
               	$file = $request->file('upload_file');
                $filename1 = 'file-' . uniqid() . '.' .$file->getClientOriginalExtension();
				$request->upload_file->storeAs('uploads', $filename1);    
                $model->file = $filename1;
            }
            if(isset($request->top))
            {
            	$model->top = $request->top;
            }
            else
            {
            	$model->top = "off";
            }
            if(isset($request->status))
            {
            	$model->status = $request->status;
            }
            else
            {
            	$model->status = "off";
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
	        Log::info('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
	        return true;  
		}catch(\Exception $ex){
			Log::error('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '() - ' . $ex->getMessage());
			DB::rollback();
			return false;
		}	
	}

	public static function Destroy($id){
		Log::info('BEGIN ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');

		$model = Post::find($id);
		DB::beginTransaction();
		try{
				DB::table('slugs')->where([
                    ['entity_id', '=', $model->id],
                    ['entity_type', '=', $model->entityType]
                ])->delete();
	        $model->delete();
	        DB::commit();
	        Log::info('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
	        return true;

	    // catch     
		}catch(\Exception $ex){
			Log::error('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '() - ' . $ex->getMessage());
			DB::rollback();
			return false;
		}	
	}
	
}



 ?>