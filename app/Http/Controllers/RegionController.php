<?php

namespace App\Http\Controllers;

use App\Region;

use App\Http\Requests;

class RegionController extends Controller
{
    use CommonController, ControllerDefaultProperty;

    public function __construct()
    {
        $this->view_dir = 'admin.region.';
        $this->middleware('role:administrator|admin');
    }


    /**
     * @return Region
     */
    protected function model()
    {
        return new Region();
    }


    /**
     * @param Region|null $data
     * @return array
     */
    protected function validate_rules(Region $data = null)
    {
        return [
            'name' => 'Required',
            'slug' => 'Required|Unique:roles'.($data && $data->id?',slug,'.$data->id:'')
        ];
    }
}
