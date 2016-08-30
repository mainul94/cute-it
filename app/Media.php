<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['title', 'slug', 'file_name', 'file_type', 'file_size','file_dimension','caption',
		'alt','description', 'url', 'thumbnail_url', 'preview_rul'];

	use CreateUpdateByRecord, RouteNameSlug, CommonRelation;
}
