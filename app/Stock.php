<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Settings\Branch;
use App\Models\Hr\Product;
use App\Tret;

class Stock extends Model
{
    public function branch()
    {
    	return $this->belongsTo(Branch::class);
    }

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

    public function trets()
    {
    	return $this->hasMany(Tret::class);
    }
}
