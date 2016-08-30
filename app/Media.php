<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Media extends Model
{
    protected $fillable = ['title', 'slug', 'file_name', 'file_type', 'file_size','file_dimension','caption',
		'alt','description', 'url', 'thumbnail_url', 'preview_rul'];

	use CreateUpdateByRecord, RouteNameSlug, CommonRelation;


	protected $mimType = ['image/jpeg','image/pjpeg','image/x-jps','image/png','image/tiff','image/x-tiff',	'image/bmp','image/gif'];


	public function setFileAttribute($data)
	{
		$now = Carbon::now();
		if ($data->isValid()) {
			$dir = 'app/public/uploads/'.$now->year.'/'.$now->month.'/';
			Storage::makeDirectory($dir);
			$dir = storage_path($dir);
			if (in_array($data->getMimeType(), $this->mimType)) {
				$image = Image::make($data->getRealPath());
				$thumbnail = $image->resize(300,300, function ($constraint) {
					$constraint->aspectRatio();
				});
				$preview =  $image->resize(700,700, function ($constraint) {
					$constraint->aspectRatio();
				});
				$image->save($dir.$data->getClientOriginalName());
				$thumbnail->save($dir.'300x300_'.$data->getClientOriginalName());
				$preview->save($dir.'700x700_'.$data->getClientOriginalName());
			}
			$path = str_replace(storage_path(), '', $dir);
			$this->attributes['url'] = $path.$data->getClientOriginalName();
			$this->attributes['thumbnail_url'] = !empty($thumbnail)? $path.'300x300_'.$data->getClientOriginalName():null;
			$this->attributes['preview_rul'] = !empty($preview)? $path.'700x700_'.$data->getClientOriginalName():null;

			$this->attributes['file_name'] = $data->getClientOriginalName();
			$this->attributes['file_type'] = $data->getClientOriginalExtension();
			$this->attributes['title'] = str_replace($data->getClientOriginalExtension(), '' ,
				$data->getClientOriginalName());
			$this->attributes['alt'] = $this->attributes['title'];
		}
	}
}
