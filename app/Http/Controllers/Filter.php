<?php 

namespace App\Http\Controllers;

use App\Models\Hr\Product;
use Illuminate\Support\Facades\Cache;

trait Filter{
	public function filter()
	{
		$keys = ['popular', 'low', 'high'];
		
		if (in_array(request('filter'), $keys)) {
			switch (request('filter')) {
				case 'popular':
					return Cache::remember('popular', 0.2, function () {
					    return Product::orderBy('hit_count', 'dsc')->get();
					});
					break;
				case 'low':
					return Cache::remember('price', 0.2, function () {
					    return Product::orderBy('price', 'asc')->get();					
					});
					break;
				case 'high':					
					return Cache::remember('high', 0.2, function () {
					    return Product::orderBy('price', 'dsc')->get();				
					});
					break;
			}
		}
		else{
			return Cache::remember('products', 0.2, function () {
			    return Product::orderBy('name', 'asc')->get();				
			});
			
		}
	}

	public function getPageTitle()
	{
		$keys = ['popular', 'low', 'high'];
		
		if (in_array(request('filter'), $keys)) {
			switch (request('filter')) {
				case 'popular':
					return 'Popular Foods';
					break;
				case 'low':
					return 'Filter With Low Price';
					break;
				case 'high':
					return 'Filter With High Price';
					break;
			}
		}
		else{
			return "Restaurant Menus";
		}
	}
}