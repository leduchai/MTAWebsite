<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\UserRole;
use Log;
use DB;
use Hash;
class UserController extends Controller
{
    //
    public function index()
    {
    	$users = User::all();
    	$role = UserRole::all();
    	return View('admin.user.list',compact('users','role'));
    }
    public function create(){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");
        $role =  UserRole::all();

        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
        return view('admin.user.form',compact('role'));
    }
    public function changerole(Request $request)
    {
        Log::info('BEGIN ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');

		// begin transaction
		DB::beginTransaction();
		// try
		try{
			if ($request->role_id != 0) {
         	foreach ($request->id as $key => $value) {
         	$user = User::find($value);
         	$user->role_id  = $request->role_id;
         	$user->save();
         }
         }
	        
	        DB::commit();
	        // neu k co loi thi tien hanh return true
	        Log::info('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
	        return redirect()->back();
	    // catch     
		}catch(\Exception $ex){
			// neu xay ra loi thi return false
			Log::error('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '() - ' . $ex->getMessage());
			DB::rollback();
			return 'Error';
		}	
    }
        public function save(Request $rq){
       Log::info('BEGIN ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');

		// begin transaction
		DB::beginTransaction();
		// try
		try{
			
			$model = new User();
	        	
			
	        $model->fill($rq->all());
            $model->password = Hash::make($rq->password);
            $model->role_id=$rq->role_id;
	        // upload image
	        $model->save();	        
	        DB::commit();
	        // neu k co loi thi tien hanh return true
	        Log::info('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
	        return redirect(route('user.list'));

	    // catch     
		}catch(\Exception $ex){
			// neu xay ra loi thi return false
			Log::error('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '() - ' . $ex->getMessage());
			DB::rollback();
			return 'ERR';
		}	
    }

}
