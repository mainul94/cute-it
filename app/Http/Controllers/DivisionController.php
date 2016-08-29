<?php

namespace App\Http\Controllers;

use App\Division;

use App\Http\Requests;

class DivisionController extends Controller
{
	use CommonController, ControllerDefaultProperty;

	public function __construct()
	{
		$this->view_dir = 'admin.division.';
		$this->middleware('role:administrator|admin');
	}


	/**
	 * @return Division
	 */
	protected function model()
	{
		return new Division();
	}


	/**
	 * @param Division|null $data
	 * @return array
	 */
	protected function validate_rules(Division $data = null)
	{
		return [
			'title' => 'Required',
			'country_id' => 'Required',
			'slug' => 'Unique:roles'.($data && $data->id?',slug,'.$data->id:'')
		];
	}
}
