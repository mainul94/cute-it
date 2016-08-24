<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 8/24/16
 * Time: 12:26 PM
 */

$menus = collect([
    collect([
        'title'=>'General',
        'link'=>'',
        'menu' => collect([
            collect([
                'title'=>'Dashboard',
                'link'=>'dashboard',
                'icon' => 'fa fa-dashboard',
                'label_class' => 'label label-success pull-right',
                'label' => 'New'
            ]),
            collect([
                'title'=>'Roles',
                'icon' => 'fa fa-cogs',
                'label_class' => 'fa fa-chevron-down',
                'label' => '',
                'children' => collect([
                    collect([
                        'title'=>'Roles',
                        'link'=>'admin/role',
                        'label_class' => 'label label-success pull-right',
                        'label' => 'All'
                    ]),
                    collect([
                        'title'=>'Create Role',
                        'link'=>'admin/role/create',
                        'label_class' => 'label label-info pull-right',
                        'label' => 'New'
                    ])
                ])
            ]),
            collect([
                'title'=>'Permissions',
                'icon' => 'fa fa-user-secret',
                'label_class' => 'fa fa-chevron-down',
                'label' => '',
                'children' => collect([
                    collect([
                        'title'=>'Permissions',
                        'link'=>'admin/permission',
                        'label_class' => 'label label-success pull-right',
                        'label' => 'All'
                    ]),
                    collect([
                        'title'=>'Create Permission',
                        'link'=>'admin/permission/create',
                        'label_class' => 'label label-info pull-right',
                        'label' => 'New'
                    ])
                ])
            ])
        ])
    ]),
    collect([
        'title'=>'Setup',
        'link'=>''
    ])
]);

?>

{!! Html::menuGenerator($menus) !!}