<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePageRequest;
use App\Http\Requests\UpdatePagesRequest;
use App\Models\Access\User\User;
use Carbon\Carbon;
use Auth;


class PageController extends Controller
{
    public function index()
    {
    	$pages = Page::paginate(10);
		foreach ($pages as $page) {
            $page->created_ago=Carbon::createFromTimeStamp(strtotime($page->created_at))->diffForHumans();
        }
		return view('backend.pages.index')->with(array("pages"=>$pages));
    }

    public function store(CreatePageRequest $request)
    {

    	$data = $request->all();
        $data["page"] = Auth::user()->id;
        $page = Page::create($data);
        //dd($page);
        return redirect(route('admin.pages.index'));
    }

    public function create()
    {
    	$users = User::all()->pluck("name","id");
        $pages = Page::all()->pluck("title", "id");

        return view("backend.pages.create")->with(array("users"=>$users, "pages"=>$pages));
    }

    public function edit($id)
    {
    	$page = Page::find($id);
        if (!$page) {
            abort(404);
        }    
        
        return view("backend.pages.edit")->with(array("page"=>$page));
    }

    public function update($id,UpdatePagesRequest $request)
    {
        $data = $request->all();
        $page = Page::find($id);
        if (!$page) {
            abort(404);
        }

        $page->title = $data['title'];
        $page->slug = $data['slug'];
        $page->description = $data['description'];
        $page->save();
        return redirect(route('admin.pages.index'));
    }

    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();
        return redirect(route('admin.pages.index'));
    }
}
