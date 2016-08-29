<?php

namespace App\Http\Controllers;

use App\Page;

use App\Http\Requests;

class PageController extends Controller
{
	use CommonController, ControllerDefaultProperty;

	public function __construct()
	{
		$this->view_dir = 'admin.page.';
		$this->middleware('role:administrator|admin');
	}


	/**
	 * @return Page
	 */
	protected function model()
	{
		return new Page();
	}


	/**
	 * @param Page|null $data
	 * @return array
	 */
	protected function validate_rules(Page $data = null)
	{
		return [
			'title' => 'Required',
			'slug' => 'Unique:roles'.($data && $data->id?',slug,'.$data->id:'')
		];
	}
}
