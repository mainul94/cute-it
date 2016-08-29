<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 8/29/16
 * Time: 3:05 PM
 */

namespace App;


trait CommonRelation
{
	/**
	 * @return mixed
	 */
	public function region()
	{
		return $this->belongsTo(Region::class);
	}

	/**
	 * @return mixed
	 */
	public function regions()
	{
		return $this->hasMany(Region::class);
	}

	/**
	 * @return mixed
	 */
	public function country()
	{
		return $this->belongsTo(Country::class);
	}

	/**
	 * @return mixed
	 */
	public function countries()
	{
		return $this->hasMany(Country::class);
	}

	/**
	 * @return mixed
	 */
	public function division()
	{
		return $this->belongsTo(Division::class);
	}

	/**
	 * @return mixed
	 */
	public function divisions()
	{
		return $this->hasMany(Division::class);
	}

	/**
	 * @return mixed
	 */
	public function slide()
	{
		return $this->belongsTo(Slide::class);
	}

	/**
	 * @return mixed
	 */
	public function slides()
	{
		return $this->hasMany(Slide::class);
	}

	/**
	 * @return mixed
	 */
	public function slideChildren()
	{
		return $this->hasMany(SlideChild::class);
	}

	/**
	 * @return mixed
	 */
	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	/**
	 * @return mixed
	 */
	public function categories()
	{
		return $this->belongsToMany(Category::class);
	}

	/**
	 * @return mixed
	 */
	public function article()
	{
		return $this->belongsTo(Article::class);
	}

	/**
	 * @return mixed
	 */
	public function articles()
	{
		return $this->belongsToMany(Article::class);
	}

	/**
	 * @return mixed
	 */
	public function relatedArticles()
	{
		return $this->belongsToMany(Article::class,'article_article','related_id');
	}
}