<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 8/17/16
 * Time: 11:13 PM
 */

namespace App;


trait RouteNameSlug
{


    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}