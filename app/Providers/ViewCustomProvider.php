<?php

namespace App\Providers;

use Collective\Html\HtmlFacade as HTML;
use Illuminate\Support\ServiceProvider;

class ViewCustomProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Added menuGenerate Function in Html builder
         */
        HTML::macro('menuGenerator', function ($menus) {
            $menuHtml = '';
            foreach ($menus as $menu) {
                $menuNode = '<div class="menu_section">';
                $menuNode .= '<h3>'.$menu->get('title').'</h3>';
                if ($menu->get('menu')) {
                    $menuNode .= '<ul class="nav side-menu">';
                    $menuNode .= ViewCustomProvider::genarateMenuItems($menu->get('menu'));
                    $menuNode .= '</ul>';
                }
                $menuNode .= '</div>';
                $menuHtml .= $menuNode;
            }
            return $menuHtml;
        });
    }


    /**
     * Generate Menu Item
     * @param $menus
     * @return string
     */
    public static function genarateMenuItems($menus)
    {
        $html = '';
        foreach ($menus as $menu) {
            $html .= '<li><a '.($menu->get('link')? ' href="'.url($menu->get('link')).'"':'').'><i class="'
            . $menu->get('icon').'"></i> '. $menu->get('title').
                ($menu->get('label_class')?' <span class="'.$menu->get('label_class').'">'. $menu->get('label').'</span>':
                    ($menu->get('children') && $menu->get('children')->count() ?'<span class="fa fa-chevron-down"></span>':'')).'</a>';
            if ($menu->get('children')) {
                $html .= '<ul class="nav child_menu">';
                $html .= ViewCustomProvider::genarateMenuItems($menu->get('children'));
                $html .= '</ul>';
            }
            $html .= '</li>';
        }

        return $html;
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
