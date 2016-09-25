<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlideChild extends Model
{
    protected $fillable = ['title', 'slug', 'caption', 'image', 'bg_color', 'slide_id', 'style'];

	use CreateUpdateByRecord, RouteNameSlug, CommonRelation;
}
