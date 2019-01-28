<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	public function imageable()
	{
		return $this->morphTo();
	}

	public function image_details()
	{
		return $this->hasOne(ImageDetail::class);
	}
}
