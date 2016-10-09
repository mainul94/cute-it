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
use Illuminate\Support\Facades\Mail;

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
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
	 */
	public function map(Request $request, Region $region=null)
	{
		if (empty($region->id)) {
			$regions = Region::all();
		}else {
			$regions = null;
		}
		if ($request->ajax()) {
			return response()->json([
				'region' => $region,
				'regions' => $regions
			]);
		}
		return view('web.map', compact('region','regions'));
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


	public function postContact(Request $request)
	{
		$this->validate($request, [
			'name' => 'Required',
			'email' => 'Required'
		]);


		$contact_email = setting('contact_email')->property_values;

		Mail::send('emails.contact', ['data' => collect($request->all())], function ($m) use ($request, $contact_email) {
			$m->from($request->get('email'), $request->get('name'));

			$m->to($contact_email, 'Web Contact Form')->subject($request->get('subject'));
		});

		return redirect()->back()->with(['message'=>['type'=>'success','msg'=>'Your Message successfully send']]);
	}
}
