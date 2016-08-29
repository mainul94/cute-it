<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	protected $fillable = ['title', 'slug', 'description'];

	use CreateUpdateByRecord, RouteNameSlug;
}
