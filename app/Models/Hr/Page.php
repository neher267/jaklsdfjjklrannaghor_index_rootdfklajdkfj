<?php

namespace App\Models\Hr;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
