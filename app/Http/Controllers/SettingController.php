<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

use App\Http\Requests;

class SettingController extends Controller
{
	use CommonController, ControllerDefaultProperty;

	public function __construct()
	{
		$this->view_dir = 'admin.setting.';
		$this->middleware('role:administrator|admin');
	}


	/**
	 * @return Setting()
	 */
	protected function model()
	{
		return new Setting();
	}


	/**
	 * @param Setting|null $data
	 * @return array
	 */
	protected function validate_rules(Setting $data = null)
	{
		return [
			'property' => 'Unique:settings'.($data && $data->id?',property,'.$data->id:''),
		];
	}
}
