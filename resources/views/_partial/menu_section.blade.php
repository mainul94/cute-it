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
                'title'=>'Home',
                'link'=>'',
                'icon' => 'fa fa-photo',
                'label_class' => 'label label-success pull-right',
                'label' => 'New'
            ]),
            collect([
                'title'=>'Forms',
                'link'=>'',
                'icon' => 'fa fa-home',
                'label_class' => 'fa fa-chevron-down',
                'label' => '',
                'children' => collect([
                    collect([
                        'title'=>'General Form',
                        'link'=>'/home',
                        'icon' => '',
                        'label_class' => '',
                        'label' => '',
                        'children' => collect([])
                    ]),
                    collect([
                        'title'=>'Advanced Components'
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