<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
	protected $fillable = ['title', 'slug', 'country_id', 'description'];

	use CreateUpdateByRecord, RouteNameSlug, CommonRelation;
}
