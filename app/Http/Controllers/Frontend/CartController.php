<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CheckoutRequest;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Cart;
use Auth;

class CartController extends Controller
{

	public function index(){
		$categories = Category::where("parent_id",0)->get();

		return view('frontend.shop.shoppingcart')->with(array("categories"=>$categories));
	}
	public function add($product_id){
		$product_id=(int) $product_id;
		$product = Product::find($product_id);
//dd($product);
		if(!$product){
			abort(404);
		}
		Cart::add($product_id,$product->title,1,$product->price);
		return redirect(route('frontend.shoppingcart'))->with("flash_success","Product added");
		//dd($product_id);
	}
	public function remove($product_id){

	}

	public function checkout()
	{
		$categories = Category::where("parent_id",0)->get();

		return view('frontend.shop.checkout')->with(array("categories"=>$categories));
		
	}

	public function thankyou()
	{
		$categories = Category::where("parent_id",0)->get();
		return view('frontend.thankyou')->with(array("categories"=>$categories));
	}


	public function checkoutprocess(CheckoutRequest $request){
		$input = $request->all();
		//dd($input);
		$customer_id = Auth::id();
		$order_total = Cart::total(2, ".", "");
		$products = Cart::content();
		//dd($products);
		$order = Order::create([
			"customer_id"=>$customer_id,
			"order_amount"=>$order_total,
			"order_phone"=>$input['phone'],
			"order_address"=>$input['address'],
			"payment_method"=>$input['payment_method'],
			]);

		foreach ($products as $product)
		{
			OrderItem::create([
				"order_id"=>$order->id,
				"product_id"=>$product->id,
				"order_item_amount"=>$product->price,
				"qty"=>$product->qty
				]);

		}

		Cart::destroy();
		return redirect(route("frontend.thankyou"))->with("flash_success","order success");
		
	}



}
