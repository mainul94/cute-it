<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

use App\Http\Requests;

class MenuController extends Controller
{
	use CommonController, ControllerDefaultProperty;

	public function __construct()
	{
		$this->view_dir = 'admin.menu.';
		$this->middleware('role:administrator|admin');
	}
	/**
	 * @return Menu
	 */
	protected function model()
	{
		return new Menu();
	}


	/**
	 * @param Menu|null $data
	 * @return array
	 */
	protected function validate_rules(Menu $data = null)
	{
		return [
			'title' => 'Required',
			'slug' => 'Unique:menus'.($data && $data->id?',slug,'.$data->id:'')
		];
	}


	public function menuChildSync(Request $request)
	{

	}
}
