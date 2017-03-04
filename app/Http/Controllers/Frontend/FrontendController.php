<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendMessageRequest;
use App\Models\Category;
use App\Models\Product;
use Input;
use Mail;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class FrontendController extends Controller
{
	/**
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		// $categories = Category::where("parent_id",0)->get();
		$products = Product::where("category_id",13)->get();
		return view('frontend.index')->with(array("products"=>$products));
	}

	public function products(){

		$categories = Category::where("parent_id",0)->get();
		$category_id = Input::get("category");
		$keyword = Input::get("q");
		$products = Product::join("categories","categories.id","=","products.category_id");

		$category=null;
		$category=Category::find($category_id);
			
		if($category)
		{
			$products = $products->where("products.category_id",$category->id);
		}
		if($keyword)
		{
			$products = $products->where("products.title","Like","%".$keyword."%");
		}
		$products = $products->orderBy("products.created_at","Desc")
							 ->select("products.*","categories.title as category_title")
							 ->paginate(16);

		// $categories = Category::where("parent_id",0)->get();

		// $products = Product::paginate(16);
		
		return view('frontend.products.index')
		->with(array(
			"categories"=>$categories,
			"category"=>$category,
			"products"=>$products,
			));
	}

	public function productdetails($id)
	{
		$categories = Category::where("parent_id",0)->get();
		$product = Product::join("users", "users.id", "=", "products.user_id")
        ->join("categories", "categories.id", "=", "products.category_id")
        ->leftJoin("brands","brands.id","=","products.brand_id")
       ->where("products.id",$id)
    	->select("products.*", "users.name AS user", "categories.title AS category","brands.name As brand")        
        ->first();

		if(!$product)
		{
			abort(404);

		}
		return view("frontend.products.detail")->with(array("product"=>$product,"categories"=>$categories));
	}

	public function contact()
	{
		$categories = Category::where("parent_id",0)->get();
		return view("frontend.contact-us")->with(array("categories"=>$categories));
	}

	public function sendmessage(SendMessageRequest $request)
	{
		$data = $request->all();
		//dd($data);
		
		Mail::send("frontend.emails.contact-message", $data,
			function ($message){
				$recept = "laylaythwe89@gmail.com";
				$message -> to($recept);
				$message -> subject("Message From LaraShop");
			}
			);
	}

	public function faq()
	{
		
	}



	/**
	 * @return \Illuminate\View\View
	 */
	public function macros()
	{
		return view('frontend.macros');
	}
}
