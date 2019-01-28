<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;
use App\Models\Settings\Category;

class Department extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function categories()
    {
    	return $this->hasMany(Category::class);
    }
}
