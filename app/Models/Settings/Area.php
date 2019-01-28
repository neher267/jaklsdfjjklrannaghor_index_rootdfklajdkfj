<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;
use App\Models\Settings\Branch;

class Area extends Model
{
	public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function district()
    {
    	return $this->belongsTo(District::class);
    }

    public function branches()
    {
    	return $this->hasMany(Branch::class);
    }
}
