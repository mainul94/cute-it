<?php

namespace App\Providers;

use App\Menu;
use App\Setting;
use Bican\Roles\Models\Permission;
use Bican\Roles\Models\Role;
use Collective\Html\FormFacade as Form;
use Collective\Html\HtmlFacade as HTML;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class ViewCustomProvider extends ServiceProvider
{

    use LeftColMenu;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {

        view()->composer('layouts._partial._web._header', function ($view) {
            $primary_menu = (int) setting('primary_menu')->property_values;
            $menus = Menu::find($primary_menu);
            $current_url = request()->fullUrl();
            $view->with('current_url', $current_url);
            return $view->with('menus',$menus->childrenFirstDepth);
        });

        view()->composer('layouts._partial._web._footer', function ($view) {
            $footer_menu =  (int) setting('footer_menu')->property_values;
            $menus = Menu::find($footer_menu);
            $current_url = request()->fullUrl();
            $view->with('current_url', $current_url);
            return $view->with('footer_menus',$menus->children);
        });

        /**
         * Added menuGenerate Function in Html builder
         */
        HTML::macro('menuGenerator', function ($menus) {
            return ViewCustomProvider::menuGenerator($menus);
        });

        /**
         * Delete Record
         */
        HTML::macro('delete',function ($action,$id, $style='icon',$class='text-danger', $label = 'Delete')
        {
            $form = Form::open(['action' => [$action,$id], 'method' => 'delete', 'id'=>'deleted_form_'.$id, 'style'=>'display:inline']);
            $form .= "<a href='#' class='confirm $class' data-id=\"deleted_form_$id\">".
                    ($style == 'icon'?"<i class=\"fa fa-trash\"></i>":$label)."</a>";
            return $form.=Form::close();
        });

        view()->composer('admin.role.*', function ($view) {
           return $view->with('permissions', Permission::all());
        });

        view()->composer('admin.user.*', function ($view) {
           return $view->with('roles', Role::all());
        });

        view()->composer('*', function ($view) {
           return $view->with('setting', new Setting());
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


}
