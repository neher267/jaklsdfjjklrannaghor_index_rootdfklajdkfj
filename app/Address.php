<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{	
	protected $fillable = ['area_id', 'block',  'road_no', 'house_no', 'house_name', 'floor'];       
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
