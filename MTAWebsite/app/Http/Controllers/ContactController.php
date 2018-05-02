<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    //
    public function index()
    { 
        $model = Contact::orderBy('id','DESC')->get();
         return View('admin.contact.list',compact('model'));
    }
    public function contact()
    {
        return View('client.contact');
    }
    public function save(Request $rq)
    {
    	$model = new Contact();
    	$model->fill($rq->all());
    	$model->save();
    	return redirect()->back()->with('message','Cảm ơn bạn đã liên hệ với chúng tôi');
    }
    public function remove($id)
    {
       $model = Contact::find($id);
       $model->delete();
       return redirect()->route('contact.list');
    }
}
