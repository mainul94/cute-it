<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	protected $onePageCategories = ['feature','service', 'portfolio', 'news', 'price']; //Todo It's tor temporerly it will come from settings

    protected $fillable = ['property', 'property_values', 's_group'];

	public function menu()
	{
		return $this->belongsTo(Menu::class,'property_values','id');
	}


	public function slide()
	{
		return $this->belongsTo(Slide::class,'property_values','id');
	}


	public function category()
	{
		return $this->belongsTo(Category::class,'property_values','id');
	}

	public function getOnpageCategories()
	{
		return $this->onePageCategories;
	}
}
