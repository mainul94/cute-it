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
    protected $paginate_per_page;
    protected $paginate_start_from;

    public function __construct()
    {
        $this->paginate_per_page = request()->get('per_page') || 15;
        $this->paginate_start_from = request()->get('pages') || 0;
    }
}