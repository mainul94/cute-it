<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 8/24/16
 * Time: 4:29 PM
 */

namespace App\Http\Controllers;



trait ControllerDefaultProperty
{

    /**
     * @return int|mixed
     */
    public function paginate_per_page()
    {
        return request()->get('per_page')?request()->get('per_page'): 20;
    }

    /**
     * @return int|mixed
     */
    public function paginate_start_from()
    {
        return request()->get('pages')?request()->get('pages'): 0;
    }
}