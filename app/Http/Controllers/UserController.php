<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    use CommonController, ControllerDefaultProperty;

    public function __construct()
    {
        $this->view_dir = 'admin.user.';
    }

    public function model()
    {
        return new User();
    }


    protected function validate_rules($data)
    {
        return [
            'name' => 'Required',
            'email' => 'Email|Unique:users,email'.($data && $data->id?',id,'.$data->id:''),
            'password' => 'Required|Confirmed|Min:6|Max:32'
        ];
    }


    public function afterSave($model, $request)
    {
        if ($request->get('password')) {
            $model->fill(['password', bcrypt($request->get('password'))]);
            $model->save();
        }
    }


    public function afterUpdate($model, $request)
    {
        $this->afterSave($model, $request);
    }
    
}
