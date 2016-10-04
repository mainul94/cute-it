<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	protected $fillable = ['title', 'slug', 'region_id', 'description'];

	use CreateUpdateByRecord, RouteNameSlug, CommonRelation;

	public function articles()
	{
		return $this->hasMany(Article::class);
	}
}
