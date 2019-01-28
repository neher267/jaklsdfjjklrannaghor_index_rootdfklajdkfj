<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings\Category;
use App\Models\Hr\Product;
use App\Models\Hr\Package;
use App\Models\Settings\Gift;
use App\Image;
use App\Order;
use Sentinel;

class PublicController extends Controller
{
    use Filter;

    public function index()
    {
        $results = $this->filter();
        $count = $results->count();
        $foods = $results->chunk(4);
        $page_title = $this->getPageTitle();

        $images = Image::with('image_details')->where('type', 'main-slider')->where('status', 1)->get();
        return view('frontend.pages.index', compact('foods', 'count', 'images', 'page_title'));
    }



    // bread 
    public function menu_item_details(Product $product){
        $page_title = $product->name;
        $current_page = "Menu";
        $categories = Category::orderBy('name')->get();
        return view('frontend.pages.product-details', compact('product','page_title','categories'));
    }

    public function menu(){
        $page_title = $this->getPageTitle();
        $results = $this->filter();
        $count = $results->count();
        $foods = $results->chunk(4);

        return view('frontend.pages.menu', compact('foods', 'count', 'page_title'));
    }


    public function contact_us(){
        $page_title = 'Contact';
        return view('frontend.pages.contact', compact('page_title'));
    }

    // end bread

    public function language_change($locale)
    {
        \Session::put('locale', $locale);
        return redirect()->back();
    }


    public function gifts()
    {
        $user = request()->user();
        $claims = array();
        if($user) {
            $claims = Gift::where('points', '<=', $user->points)->orderBy('points', 'des')->get()->chunk(4);
            $gifts = Gift::where('points', '>', $user->points)->orderBy('points', 'asc')->get()->chunk(4);        
        } else {
            $gifts = Gift::orderBy('points', 'des')->get()->chunk(4);  
        }
        return view('frontend.gifts', compact('gifts', 'claims'));
    }

    public function categories(){
        $page_title = 'Categories';
        return back();
    }


    public function category_foods(Category $category)
    {
        $page_title = $category->name.' all foods';
        //$results = $category->products()->get();
        //$count = $results->count();
        $foods = $category->products()->get()->chunk(4);
        return view('frontend.pages.category-products', compact('foods', 'page_title'));
    }

    public function product_packages(Product $product) {
        $results = $product->packages()->orderBy('hit_count', 'dsc')->get();
        $count = $results->count();
        $packages = $results->chunk(4);
        return view('frontend.packages', compact('packages','count'));        
    }

    public function package_details($title, Package $package) {
        $images = $package->images()->where('type', 'Details')->get();
        return view('frontend.package-details', compact('images' ,'package'));        
    }  

    public function gift_details(Gift $gift) {
        $images = $gift->images()->where('type', 'Details')->get();
        return view('frontend.gift-details', compact('images' ,'gift'));        
    }  

    public function popular_packages()
    {
        return view('frontend.popular-packages');         
    }

    
    public function my_orders()
    {
        $page_title = "My Orders";
        $orders = Sentinel::getUser()->myOrders()->latest()->paginate(10);
        return view('frontend.pages.customer-orders', compact('page_title', 'orders'));
    }

    public function order_details(Order $order)
    {
        $page_title = "Details";
        if(Sentinel::getUser()->id == $order->user_id){
            $details = $order->order_details;  
            return view('frontend.pages.customer-order-details', compact('page_title', 'details'));
        }

        return back();   
    }
}
