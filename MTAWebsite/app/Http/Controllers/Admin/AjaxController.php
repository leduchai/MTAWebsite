<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CatePost;
use DB;
use Log;
class AjaxController extends Controller
{
    //
	public function cms(Request $request)
	{
		Log::info('BEGIN ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
		// begin transaction
		DB::beginTransaction();
		// try
		try{
			$model = new CatePost();
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
	        // neu k co loi thi tien hanh return true
			Log::info('END ' 
				. get_class() . ' => ' . __FUNCTION__ . '()');
			return response()->json(['data' => $model]);

	    // catch     
		}catch(\Exception $ex){
			// neu xay ra loi thi return false
			Log::error('END ' 
				. get_class() . ' => ' . __FUNCTION__ . '() - ' . $ex->getMessage());
			DB::rollback();
			return response()->json(['data' => '1']);
		}	
	}
}
