<?php

namespace App\Http\Controllers;

use App\Slide;

use App\Http\Requests;

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
	 * @param Slide|null $data
	 * @return array
	 */
	protected function validate_rules(Slide $data = null)
	{
		return [
			'title' => 'Required',
			'slug' => 'Unique:roles'.($data && $data->id?',slug,'.$data->id:'')
		];
	}
}
