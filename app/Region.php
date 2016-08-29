<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = ['title', 'slug', 'description'];

	use CreateUpdateByRecord, RouteNameSlug, CommonRelation;
}
