<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Log;
use DB;
use App\Http\Requests\SaveBannerRequest;
class FacultyController extends Controller
{
    //
     public function index()
    {
    	$model = Faculty::all();
    	return View('admin.faculty.list',compact('model'));
    }
    public function create(){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");

        // lấy ra model mẫu
        $model = new Faculty();

       
        
   

        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
        return view('admin.faculty.form', compact('model'));
    }

    /**
     * Form cập nhật danh mục
     * @author ThienTH
     * @return view
     * @date 2017-07-28 - create new
     */
    public function update($id){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");

        // lấy ra model mẫu
        $model = Faculty::find($id);
        if(!$model){
            Log::info('END ' 
            . get_class() . ' => ' . __FUNCTION__ . '()');
            return redirect()->route('404.error');
        }
        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
        return view('admin.faculty.form', compact('model'));
    }

    /**
     * Save category
     * @author ThienTH
     * @return view
     * @date 2017-07-21 - create new
     */
    public function save(Request $request){
        Log::info('BEGIN ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
		// begin transaction
		DB::beginTransaction();
		// try
		try{
			if($request->id > 0){
				$model = Faculty::find($request->id);
			}else{
				$model = new Faculty();
			}
	        $model->fill($request->all());
	        if($request->hasFile('upload_image')){
                $image = $request->file('upload_image');
                $filename = 'image-' . uniqid() . '.' . $image->getClientOriginalExtension();
				$request->upload_image->storeAs('uploads', $filename);    
                $model->images =$filename;
            }
	        $model->save();
	        DB::commit();
	        // neu k co loi thi tien hanh return true
	        Log::info('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
	        return redirect()->route('faculty.list');

	    // catch     
		}catch(\Exception $ex){
			// neu xay ra loi thi return false
			Log::error('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '() - ' . $ex->getMessage());
			DB::rollback();
			return 'Error';
		}	
    }

	/**
	 * remove category
	 * @author Vdong
	 * @return view
	 * @date 2017-07-21 - create new
	 */
    public function remove($id){
    	Log::info('BEGIN ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');

		$model = Faculty::find($id);
		// begin transaction
		DB::beginTransaction();
		// try
		try{
	        $model->delete();
	        DB::commit();
	        // neu k co loi thi tien hanh return true
	        Log::info('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
	       return redirect()->route('faculty.list');
	    // catch     
		}catch(\Exception $ex){
			// neu xay ra loi thi return false
			Log::error('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '() - ' . $ex->getMessage());
			DB::rollback();
			return 'Error';
		}	
    }
}
