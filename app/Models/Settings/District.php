<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function areas()
    {
    	return $this->hasMany(Area::class);
    }
}
