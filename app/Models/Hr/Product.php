<?php

namespace App\Models\Hr;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use App\Image;
use App\Models\Settings\Category;
use App\Models\Hr\Price;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use App\Traits\CommentableTrait;

class Product extends Model implements Buyable
{

    use CommentableTrait;

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    

    public function images()
    {
    	return $this->morphMany(Image::class, 'imageable');
    }

    public function packages()
    {
    	return $this->morphMany(Package::class, 'packageable');
    }

    public function unit_prices()
    {
        return $this->morphMany(Price::class, 'priceable');
    }

    /**
     * Get the identifier of the Buyable item.
     *
     * @return int|string
     */
    public function getBuyableIdentifier($options = null)
    {
        return $this->id;
    }

    /**
     * Get the description or title of the Buyable item.
     *
     * @return string
     */
    public function getBuyableDescription($options = null)
    {
        return $this->name;
    }

    /**
     * Get the price of the Buyable item.
     *
     * @return float
     */
    public function getBuyablePrice($options = null)
    {
        return $this->price;
    }

    public function makePopular()
    {
        $this->hit_count = $this->hit_count+1;
        $this->save();
    }

}
