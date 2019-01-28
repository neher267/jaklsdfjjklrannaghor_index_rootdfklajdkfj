<?php

namespace App;
use App\Models\Hr\Product;
use Sentinel;
use Cartalyst\Sentinel\Users\EloquentUser as User;
use App\Models\Settings\Branch;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

    public function branch()
    {
    	return $this->belongsTo(Branch::class);
    }

    public function buyer()
    {
    	return $this->belongsTo(User::class, 'buyer_id', 'id');
    }

    public function merchant()
    {
    	return $this->belongsTo(User::class, 'merchant_id', 'id');
    }
}
