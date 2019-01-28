<?php 

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Models\Settings\Category;

class CustomerComposer
{
	public function compose(View $view)
    {
        $view->with('all_categories', Category::orderBy('name', 'asc')->get());
    }
}