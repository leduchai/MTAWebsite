<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Log;
use App\Http\Requests\SaveProfileRequest;
use App\Http\Requests\SaveChangePasswordRequest;
use Hash;
class ProfileController extends Controller
{
    public function update(){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");

    	$user = Auth::user();
        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
    	return view('admin.profile.form', compact('user'));
    }
    public function save(SaveProfileRequest $rq){
        Log::info("BEGIN " . get_class() . " => " . __FUNCTION__ ."()");
    	if(isset($rq->new_password)){
            $newPass = Hash::make($rq->new_password);
            Auth::user()->password = $newPass;
        }
    	if($rq->hasFile('avatar')){
			$fileName = uniqid() . "." . $rq->avatar->extension();
			$rq->avatar->storeAs('uploads', $fileName);
			Auth::user()->images = 'uploads/'.$fileName;		
		}
		Auth::user()->name = $rq->name;
        Auth::user()->save();
        Log::info("END " . get_class() . " => " . __FUNCTION__ ."()");
    	return redirect(route('admin'));
    } 
}
