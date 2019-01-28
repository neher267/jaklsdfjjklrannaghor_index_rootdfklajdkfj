<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hr\Product;
use App\Models\Settings\Department;
use App\Models\Settings\Branch;
use App\Image;

class Category extends Model
{
    
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function products()
    {
    	return $this->hasMany(Product::class);
    }

    public function branch()
    {
    	return $this->belongsTo(Branch::class);
    }

    public function department()
    {
    	return $this->belongsTo(Department::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
