<?php

namespace App\Http\Controllers;

use App\Article;
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
