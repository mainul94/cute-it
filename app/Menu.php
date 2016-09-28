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

	/**
	 * get Child Menu
	 * @return mixed
	 */
	public function childrenFirstDepth()
	{
		return $this->hasMany(MenuChild::class)->where('menu_children_id',null);
	}
}
