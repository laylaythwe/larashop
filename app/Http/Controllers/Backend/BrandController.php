<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Access\User\User;
use Carbon\Carbon;
use Auth;
use Image;

class BrandController extends Controller
{
    public function index()
    {

    	$brands = Brand::paginate(10);
		foreach ($brands as $brand) {
            $brand->created_ago=Carbon::createFromTimeStamp(strtotime($brand->created_at))->diffForHumans();
        }
		return view('backend.brands.index')->with(array("brands"=>$brands));
    }

    public function store(CreateBrandRequest $request)
    {

    	$data = $request->all();
            $data ["user_id"] = Auth::id();

            $img = Image::make($_FILES['logo']['tmp_name']);

            $img->resize(800, 640);
            $img_name = time().".jpg";
            $img->save(public_path("uploads/brands/".$img_name));

            $data["logo"] = $img_name;

    	$brand = Brand::create($data);
    	return redirect()->route("admin.brands.index")->withFlashSuccess("Brand Created Successfully.");
    	
    }

    public function create()
    {
    	$users = User::all()->pluck("name","id");
    	$brands = Brand::all()->pluck("name", "id");

    	return view("backend.brands.create")->with(array("users"=>$users, "brands"=>$brands));
    }

    public function edit($id)
    {
    	$brand = Brand::find($id);

        if(!$brand)
            abort(404);


        return view("backend.brands.edit")->with(array( "brand"=>$brand));
    }

    public function update($id,UpdateBrandRequest $request)
    {
    	$data = $request->all();

		$brand = Brand::find($id);

		if(!$brand)
			abort(404);

		if(!empty($_FILES['logo']['name'])){

			$img = Image::make($_FILES['logo']['tmp_name']);
			$img -> resize(800, 640);

			$img_name = time().".jpg";
			$img->save(public_path("uploads/brands/".$img_name));

			$data["logo"] = $img_name;
    }
    $brand->update($data);
		// dd($data);
		return redirect()->route('admin.brands.index')->with("flash_success", "Updated Successfully.");
}

    public function destroy()
    {

    }


}
