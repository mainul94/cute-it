<?php
/**
 * Created by PhpStorm.
 * User: kamrul
 * Date: 10/4/16
 * Time: 12:15 PM
 */?>
@if(isset($article->widgets) && $article->widgets->count())
	@include('web._partial._widget',['widgets'=>$article->widgets])
@endif
@if(isset($article->relatedArticles) && $article->relatedArticles->count())
	@include('web._partial._related_article',['relatedArticles'=>$article->relatedArticles])
@endif