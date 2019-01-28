<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Stock;

class Tret extends Model
{
    public function stock()
    {
    	return $this->belongsTo(Stock::class);
    }
}
