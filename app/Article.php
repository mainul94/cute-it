<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $fillable = ['title', 'slug', 'content', 'summery', 'feature_image', 'feature_caption', 'bg_color',
		'slide_id', 'template', 'sidebar_bg_color', 'slide_position'];

	use CreateUpdateByRecord, RouteNameSlug, CommonRelation;


	public function getCategoryIdAttribute()
	{
		return $this->categories()->lists('category_id')->all();
	}

	public function getRelatedIdAttribute()
	{
		return $this->relatedArticles->lists('id')->all();
	}
}
