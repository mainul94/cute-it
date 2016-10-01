<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'feature_image', 'feature_caption', 'bg_color'];

	use CreateUpdateByRecord, RouteNameSlug, CommonRelation;

}
