<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Log;
use DB;
use App\Http\Requests\SaveSettingRequest;
class SettingController extends Controller
{
    //
    public function update(){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");

        // lấy ra model mẫu
        $model = Setting::first();
    

        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
        return view('admin.setting.form', compact('model'));
    }
    public function save(SaveSettingRequest $request){
       Log::info('BEGIN ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
		// begin transaction
		DB::beginTransaction();
		// try
		try{

			
			$model = Setting::find($request->id);
			
	        $model->fill($request->all());
	        if($request->hasFile('img_logo')){
                $image = $request->file('img_logo');
                $filename = 'image-' . uniqid() . '.' . $image->getClientOriginalExtension();
				$request->img_logo->storeAs('uploads', $filename);    
                $model->logo =$filename;
            }
	        $model->save();
	        

	        DB::commit();
	        // neu k co loi thi tien hanh return true
	        Log::info('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
	        return redirect()->route('admin');

	    // catch     
		}catch(\Exception $ex){
			// neu xay ra loi thi return false
			Log::error('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '() - ' . $ex->getMessage());
			DB::rollback();
			return "Error";
		}	
    }
}
