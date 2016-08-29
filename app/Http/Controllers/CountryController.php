<?php

namespace App\Http\Controllers;

use App\Country;

use App\Http\Requests;

class CountryController extends Controller
{
	use CommonController, ControllerDefaultProperty;

	public function __construct()
	{
		$this->view_dir = 'admin.country.';
		$this->middleware('role:administrator|admin');
	}


	/**
	 * @return Country
	 */
	protected function model()
	{
		return new Country();
	}


	/**
	 * @param Country|null $data
	 * @return array
	 */
	protected function validate_rules(Country $data = null)
	{
		return [
			'title' => 'Required',
			'region_id' => 'Required',
			'slug' => 'Unique:roles'.($data && $data->id?',slug,'.$data->id:'')
		];
	}
}
