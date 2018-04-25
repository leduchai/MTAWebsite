<?php 
namespace App\Repository;
use Log;
use App\Models\CatePost;
use Illuminate\Http\Request;
use DB;
use App\Models\Slug;
use App\Models\Post;
use App\Models\CTPost;
class CatePostRepository
{
	public static function GetAll(){
		Log::info('BEGIN ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
            $cateList = CatePost::all();
			Log::info('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
			return $cateList;	
	}
	public static function Save(Request $request){
		
		Log::info('BEGIN ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
		DB::beginTransaction();
		try{
			if($request->id > 0){
				$model = CatePost::find($request->id);
			}else{
				$model = new CatePost();
			}
	        $model->fill($request->all());
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

		$model = CatePost::find($id);

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