<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Country;
use App\Page;
use App\Region;
use Illuminate\Http\Request;

use App\Http\Requests;

class WebController extends Controller
{
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
	 */
	public function country(Request $request, Country $country)
	{
		//
	}


	/**
	 * @param Request $request
	 * @param Page $page
	 */
	public function page(Request $request, Page $page)
	{
		//
	}


	/**
	 * @param Request $request
	 * @param Category $category
	 * @param Article $article
	 */
	public function category(Request $request, Category $category=null, Article $article=null)
	{
		//
	}
}