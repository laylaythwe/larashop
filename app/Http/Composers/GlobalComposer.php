<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use App\Models\Category;
/**
 * Class GlobalComposer
 * @package App\Http\Composers
 */
class GlobalComposer
{

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view)
	{
		$categories = Category::where("parent_id", 0)->get();
		$view->with('logged_in_user', access()->user());
		$view->with('categories',$categories);
	}
}