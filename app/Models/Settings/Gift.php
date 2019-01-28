<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;
use App\Image;

class Gift extends Model
{
	public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function images()
    {
    	return $this->morphMany(Image::class, 'imageable');
    }
}
