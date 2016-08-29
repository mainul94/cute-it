<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	protected $fillable = ['title', 'slug', 'content', 'summery'];

	use CreateUpdateByRecord, RouteNameSlug, CommonRelation;
}
