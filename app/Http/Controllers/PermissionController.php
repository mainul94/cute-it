<?php

namespace App\Http\Controllers;

use Bican\Roles\Models\Permission;

use App\Http\Requests;

class PermissionController extends Controller
{
    use CommonController, ControllerDefaultProperty;

    public function __construct()
    {
        $this->view_dir = 'admin.permission.';
    }


    /**
     * @return Permission
     */
    protected function model()
    {
        return new Permission();
    }


    /**
     * @param null $data
     */
    protected function validate_rules($data = null)
    {
        return [
            'name' => 'Required',
            'slug' => 'Required|Unique:roles'.($data && $data->id?',slug,'.$data->id:'')
        ];
    }
}
