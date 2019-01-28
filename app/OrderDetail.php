<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hr\Product;

class OrderDetail extends Model
{
    public $timestamps = false;

    public function order()
    {
    	return $this->belongsTo(Order::class);
    }

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
