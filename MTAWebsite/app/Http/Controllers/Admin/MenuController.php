<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CatePost;
use App\Models\Page;
use App\Models\Menu;
use App\Http\Requests\SaveMenuRequest;
class MenuController extends Controller
{
    //
    public function index()
    {
    	$cPost = CatePost::all();
    	$page = Page::all();
    	$menu = Menu::all();
    	return View('admin.menu.list',compact('cPost','page','menu'));
    }
    public function createpage(Request $rq)
    {    
    	if (isset($rq->id)) {
    	foreach ($rq->id as $key => $value) {
    		$page = Page::find($value);
        	$model = new Menu();
        	$model->title = $page->title;
            $model->page_id = $page->id;
        	$model->url = $page->getSlug();
        	$model->save();
        }
    	}
        return redirect()->back();
    }
    public function createpost(Request $rq)
    {    
    	if (isset($rq->id)) {
    	foreach ($rq->id as $key => $value) {
    		$cPost = CatePost::find($value);
        	$model = new Menu();
        	$model->title = $cPost->title;
            $model->category_id = $cPost->id;
        	$model->url = $cPost->getSlug();
        	$model->save();
        }
    	}
        return redirect()->back();
    }
    public function remove(Request $rq)
    {
    	$menu = Menu::find($rq->id);
    	if (!$menu) {
    		return redirect()->route('404');
    	}
        $childs = Menu::where('parent_id',$menu->id)->get();
        foreach ($childs as $key => $value) {
           $child = Menu::find($value->id);
           $child->parent_id = 0;
           $child->save();
        }
    	$menu->delete();
    	return redirect()->back();
    }
    public function update(Request $rq)
    {
    	$model = Menu::find($rq->id);
    	if (!$model) {
    		return redirect()->route('404');
    	}
    	$listMenu = Menu::where('id','!=',$model->id)->get();
        $listMenu = get_options($listMenu);
    	return View('admin.menu.form',compact('model','listMenu'));
    }
    public function save(SaveMenuRequest $rq)
    { 
        if($rq->id>0)
        {
            $model = Menu::find($rq->id);
        }
    	else
        {
            $model = new Menu();
        }
        $model->fill($rq->all());
        $model->save();
        return redirect()->route('menu');
    }
}
