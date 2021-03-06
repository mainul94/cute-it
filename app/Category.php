<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['title', 'slug', 'content', 'summery', 'feature_image', 'feature_caption', 'bg_color',
		'slide_id', 'template'];

	use CreateUpdateByRecord, RouteNameSlug, CommonRelation;

	protected $templates = ['Default'=>'Default', 'List'=>'List', 'Feature' => 'Feature', 'Service'=>'Service',
		'Portfolio'=>'Portfolio', 'blog'=>'Blog', 'price'=>'Price'];

	public function getTemplatesAttribute()
	{
		return $this->templates;
	}

}
