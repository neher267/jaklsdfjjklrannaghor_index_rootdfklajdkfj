<?php 

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Models\Hr\Package;

class PopularComposer
{
	public function compose(View $view)
    {
        $view->with('popular_packages', Package::orderBy('hit_count', 'dsc')->limit(12)->get()->chunk(4));
    }
}