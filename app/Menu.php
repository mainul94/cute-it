<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	protected $fillable = ['title', 'slug'];

	use CreateUpdateByRecord, RouteNameSlug;


	/**
	 * get Child Menu
	 * @return mixed
	 */
	public function children()
	{
		return $this->hasMany(MenuChild::class);
	}
}
