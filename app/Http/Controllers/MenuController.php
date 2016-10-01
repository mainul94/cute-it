<?php

namespace App\Http\Controllers;

use App\Menu;
use App\MenuChild;
use Illuminate\Http\Request;

use App\Http\Requests;

class MenuController extends Controller
{
	use CommonController, ControllerDefaultProperty;



	protected $order = 0;
	protected $depth = 0;
	protected $child_parent = null;
	protected $children_values;

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


	/**
	 * @param Menu $model
	 * @param Request $request
	 */
	public function afterUpdate(Menu $model, Request $request)
	{
		$this->children_values = json_decode($request->get('children'));
		$this->childReorder($this->children_values);
	}


	public function childReorder($children, $parent=null)
	{
		foreach ($children as $child) {
			$this->order += 1;
			$menu = MenuChild::find($child->id);
			$menu->fill([
				'order_no' => $this->order,
				'menu_children_id' => $parent
			]);
			$menu->save();
			if (isset($child->children)) {
				$this->childReorder($child->children, $child->id);
			}
		}

	}
}
