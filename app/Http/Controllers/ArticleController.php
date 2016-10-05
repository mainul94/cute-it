<?php

namespace App\Http\Controllers;

use App\Article;
use App\Widget;
use Illuminate\Http\Request;

use App\Http\Requests;

class ArticleController extends Controller
{
	use CommonController, ControllerDefaultProperty;

	public function __construct()
	{
		$this->view_dir = 'admin.article.';
		$this->middleware('role:administrator|admin');
	}


	/**
	 * @return Article
	 */
	protected function model()
	{
		return new Article();
	}


	/**
	 * @param Article|null $data
	 * @return array
	 */
	protected function validate_rules(Article $data = null)
	{
		return [
			'title' => 'Required',
			'slug' => 'Unique:articles'.($data && $data->id?',slug,'.$data->id:'')
		];
	}

	/**
	 * @param Article $model
	 * @param $request
	 */
	public function afterSave(Article $model, Request $request)
	{
		$model->categories()->sync($request->get('category_id')?$request->get('category_id'):[]);
		$model->relatedArticles()->sync($request->get('related_id')?$request->get('related_id'):[]);
		$model->widgets()->sync($this->insertOrUpdateChild($request));
	}

	public function insertOrUpdateChild(Request $request)
	{
		$children = [];
		$values = $request->all();
		if (array_key_exists('wd_title', $values)) {
			foreach ($values['wd_title'] as $key=>$val){
				if (!empty($values['wd_id'][$key])) {
					$child = Widget::find($values['wd_id'][$key]);
				} else {
					$child = new Widget();
				}
				$child->fill([
					'title' => $values['wd_title'][$key],
//				'content' => $values['wd_content'][$key],
					'summery' => $values['wd_summery'][$key],
					'bg_color' => $values['wd_bg_color'][$key],
					'feature_image' => $values['wd_feature_image'][$key],
					'feature_caption' => $values['wd_feature_caption'][$key]
				])->save();
				array_push($children, $child->id);
			}
		}
		return $children;
	}


	/**
	 * @param $model
	 * @param $request
	 */
	public function afterUpdate (Article $model, Request $request)
	{
		$this->afterSave($model, $request);
	}
}
