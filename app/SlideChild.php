<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SlideChild extends Model
{
    protected $fillable = ['title', 'slug', 'caption', 'image', 'bg_color', 'slide_id', 'style'];

	use RouteNameSlug, CommonRelation;
	public static function boot() {
		parent::boot();

		static::saving(function($table)  {
			if (empty($table->slug) && in_array('slug', $table->fillable)) {
				$slug = str_slug(empty($table->slug)?$table->title:$table->slug);
				$count = DB::table($table->getTable())->where('slug','like',$slug.'%')->count();
				$table->slug = $slug.($count?'-'.$count:'');
			}
		});
	}


	public function imageMedia()
	{
		return $this->belongsTo(Media::class, 'image','id');
	}
}
