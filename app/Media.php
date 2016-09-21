<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\File;

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
			$dir = 'public/uploads/'.$now->year.'/'.$now->month.'/';
			Storage::makeDirectory($dir);
			$dir = storage_path('app/'.$dir);
			$path = str_replace(storage_path(), '', $dir);
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
				list($width, $height) = getimagesize($data);
				$this->attributes['file_dimension'] = $width . 'x' . $height;
			}else {
				Storage::put($path.$data->getClientOriginalName(),file_get_contents($data->getRealPath()));
			}
			$this->attributes['url'] = $path.$data->getClientOriginalName();
			$this->attributes['thumbnail_url'] = !empty($thumbnail)? $path.'300x300_'.$data->getClientOriginalName():null;
			$this->attributes['preview_rul'] = !empty($preview)? $path.'700x700_'.$data->getClientOriginalName():null;

			$this->attributes['file_name'] = $data->getClientOriginalName();
			$this->attributes['file_type'] = $data->getClientOriginalExtension();
			$this->attributes['file_size'] = get_size_to_user_max_gb($data->getClientSize());
			$this->attributes['title'] = title_case(str_replace($data->getClientOriginalExtension(), '',
				$data->getClientOriginalName()));
			$this->attributes['alt'] = $this->attributes['title'];

		}
	}

	public function scopeDirectory($query, Request $request)
	{
		return $query->where([['url','like',$request->get('directory').'%']]);
	}

	public function scopeType($query, Request $request)
	{
		if ($request->get('type')) {
			$query->where('file_type',$request->get('type')); // ToDo Change file_type field to media_type after create media type column.
		}
		return $query;
	}

	public function deleteFiles()
	{
		Storage::delete([str_replace('/app/','',$this->url), str_replace('/app/','',$this->thumbnail_url),
			str_replace('/app/','',$this->preview_rul)]);
	}
}
