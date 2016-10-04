<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Country;
use App\Page;
use App\Region;
use App\Slide;
use Illuminate\Http\Request;

use App\Http\Requests;

class WebController extends Controller
{
	/**
	 * @param Request $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function welcome(Request $request)
	{
		$slide_id = (int) setting('home_slide')->property_values;
		$slide = Slide::find($slide_id);
		return view('welcome',compact('slide'));
	}

	/**
	 * @param Request $request
	 * @param Region $region
	 */
	public function map(Request $request, Region $region=null)
	{
		//
	}


	/**
	 * @param Request $request
	 * @param Country $country
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
	 */
	public function country(Request $request, Country $country)
	{

		if ($request->ajax()) {
			return response()->json([
				'country' => $country
			]);
		}
		return view('web.country', compact('country'));
	}


	/**
	 * @param Request $request
	 * @param Page $page
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
	 */
	public function page(Request $request, Page $page)
	{
		if ($request->ajax()) {
			return response()->json([
				'page' => $page
			]);
		}
		return view('web.page', compact('page'));
	}


	/**
	 * @param Request $request
	 * @param Category $category
	 * @param Article $article
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
	 */
	public function category(Request $request, Category $category=null, Article $article=null)
	{
		if ($request->ajax()) {
			return response()->json([
				'category' => $category,
				'article' => $article
			]);
		}
		if ($request->route()->getParameter('article')) {
			return view('web.article', compact('article'));
		} else {
			return view('web.category', compact('category'));
		}
	}
}
