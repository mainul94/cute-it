<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
	protected $fillable = ['title', 'slug', 'content', 'summery', 'feature_image', 'feature_caption', 'bg_color'];

	use CreateUpdateByRecord, RouteNameSlug, CommonRelation;


	public function imageMedia()
	{
		return $this->belongsTo(Media::class, 'feature_image','id');
	}
}
