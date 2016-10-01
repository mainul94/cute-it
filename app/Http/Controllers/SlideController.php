<?php

namespace App\Http\Controllers;

use App\Slide;

use App\Http\Requests;
use App\SlideChild;
use Illuminate\Http\Request;

class SlideController extends Controller
{
	use CommonController, ControllerDefaultProperty;

	public function __construct()
	{
		$this->view_dir = 'admin.slide.';
		$this->middleware('role:administrator|admin');
	}


	/**
	 * @return Slide
	 */
	protected function model()
	{
		return new Slide();
	}


	/**
	 * Entry Slide Children and Synconize with slide
	 * @param Slide $slide
	 * @param Request $request
	 */
	public function afterSave(Slide $slide, Request $request)
	{
		$slideChildren = [];
		$values = $request->all();
		foreach ($values['ch_title'] as $key=>$val){
			if (!empty($values['ch_id'][$key])) {
				$child = SlideChild::find($values['ch_id'][$key]);
			} else {
				$child = new SlideChild();
			}
			$child->fill([
				'title' => $values['ch_title'][$key],
				'caption' => $values['ch_caption'][$key],
				'image' => $values['image'][$key],
				'bg_color' => $values['ch_bg_color'][$key],
				'style' => empty($values['style'][$key])?null:$values['style'][$key],
				'slide_id' => $slide->id
			])->save();
			array_push($slideChildren, $child->id);
		}
	}

	/**
	 * Entry or Update Slide Children and Synconize with slide
	 * @param Slide $slide
	 * @param Request $request
	 */
	public function afterUpdate(Slide $slide, Request $request)
	{
		$this->afterSave($slide, $request);
	}

	/**
	 * @param Slide|null $data
	 * @return array
	 */
	protected function validate_rules(Slide $data = null)
	{
		return [
			'title' => 'Required',
			'slug' => 'Unique:slides'.($data && $data->id?',slug,'.$data->id:'')
		];
	}
}
