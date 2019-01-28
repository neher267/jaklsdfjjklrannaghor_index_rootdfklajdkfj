<?php

namespace App\Models\Hr;

use Illuminate\Database\Eloquent\Model;
use App\Image;

class Package extends Model
{
	public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function packageable()
    {
    	return $this->morphTo();
    }

    public function images()
    {
    	return $this->morphMany(Image::class, 'imageable');
    }
}
