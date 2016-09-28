<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuChild extends Model
{
	protected $fillable = ['title', 'slug', 'menu_id', 'menu_children_id', 'link_type', 'url', 'css_class', 'order_no'];

	use CreateUpdateByRecord, RouteNameSlug;


	/**
	 * Get Menu
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function menu()
	{
		return $this->belongsTo(Menu::class);
	}


	/**
	 * get Child Menu
	 * @return mixed
	 */
	public function children()
	{
		return $this->hasMany(MenuChild::class,'menu_children_id');
	}
}
