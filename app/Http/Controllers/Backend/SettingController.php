<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Access\User\User;
use Carbon\Carbon;
use Auth;



class SettingController extends Controller
{
    public function index(){

    	$settings = Setting::paginate(10);
		foreach ($settings as $setting) {
            $setting->created_ago=Carbon::createFromTimeStamp(strtotime($setting->created_at))->diffForHumans();
        }
		return view('backend.settings.index')->with(array("settings"=>$settings));
    }

    public function create(){
    	$users = User::all()->pluck("name","id");
    	$settings = Setting::all()->pluck("title", "id");

    	return view("backend.settings.create")->with(array("users"=>$users, "settings"=>$settings));
    }

    public function store(CreateSettingRequest $request){
		$data = $request->all();
        $data["setting"] = Auth::user()->id;
        $setting = Setting::create($data);
        //dd($setting);
        //Flash::success("Setting created successfully!");
        //return view("backend.categories.create");
        return redirect(route('admin.settings.index'));
    }
    public function edit($id){

    	$setting = Setting::find($id);
        if (!$setting) {
            abort(404);
        }    
        
        return view("backend.settings.edit")->with(array("setting"=>$setting));
    }

    public function update($id,UpdateSettingRequest $request){

    	$data = $request->all();
        $setting = Setting::find($id);
        if (!$setting) {
            abort(404);
        }

        $setting->name = $data['name'];
        $setting->value = $data['value'];
        $setting->save();
        return redirect(route('admin.settings.index'));
    }

    public function destroy($id)
    {
    	$setting = Setting::find($id);
        $setting->delete();
        return redirect(route('admin.settings.index'));
    }
}
