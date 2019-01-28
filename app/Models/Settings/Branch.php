<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;
use App\Address;
use App\Models\Settings\Area;

class Branch extends Model
{
	public function getRouteKeyName()
    {
        return 'slug';
    }

	public function area()
    {
    	return $this->belongsTo(Area::class);
    }

    public function address()
    {
    	return $this->belongsTo(Address::class);
    }

    /*public function address()
    {
    	return $this->belongsTo(Address::class);
    }*/
}
