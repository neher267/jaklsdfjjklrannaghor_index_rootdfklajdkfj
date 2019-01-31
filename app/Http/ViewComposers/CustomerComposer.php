<?php 

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Models\Settings\Category;
use App\Order;

class CustomerComposer
{
	public function compose(View $view)
    {
        $view->with('all_categories', Category::orderBy('name', 'asc')->get());
        $view->with('pending_count', Order::where('status',0)->get()->count());
        $view->with('confirm_count', Order::where('status',1)->get()->count());        
        $view->with('cancel_count', Order::where('status',2)->get()->count());
    }
}