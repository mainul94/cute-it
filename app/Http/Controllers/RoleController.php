<?php

namespace App\Http\Controllers;

use Bican\Roles\Models\Role;


class RoleController extends Controller
{

    use ControllerDefaultProperty, CommonController;



    /**
     * RoleController constructor.
     */
    public function __construct()
    {
        $this->view_dir = 'admin.role.';
    }

    /**
     * Set Model for user this Controller
     * @return Role
     */
    protected function model () {
       return new Role();
    }


    /**
     * @param null $data
     * @return array
     */
    protected function validate_rules($data = null) {
        return [
            'name' => 'Required',
            'slug' => 'Required|Unique:roles'.($data && $data->id?',slug,'.$data->id:'')
        ];
    }

}
