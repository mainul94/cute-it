<?php

namespace App\Http\Controllers;

use App\Category;

use App\Http\Requests;

class CategoryController extends Controller
{
	use CommonController, ControllerDefaultProperty;

	public function __construct()
	{
		$this->view_dir = 'admin.category.';
		$this->middleware('role:administrator|admin');
	}


	/**
	 * @return Category
	 */
	protected function model()
	{
		return new Category();
	}


	/**
	 * @param Category|null $data
	 * @return array
	 */
	protected function validate_rules(Category $data = null)
	{
		return [
			'title' => 'Required',
			'slug' => 'Unique:roles'.($data && $data->id?',slug,'.$data->id:'')
		];
	}
}
