<?php

namespace UrsacoreLab\Gallery;

use Backend\Facades\Backend;
use Backend\Models\UserRole;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public $require = ['UrsacoreLab.StaticVars'];

    public function pluginDetails(): array
    {
        return [
            'name'        => 'ursacorelab.gallery::lang.plugin.name',
            'description' => 'ursacorelab.gallery::lang.plugin.description',
            'author'      => 'UrsacoreLab',
            'icon'        => 'icon-leaf',
        ];
    }

    public function registerPermissions(): array
    {
        return [
            'ursacorelab.gallery.access' => [
                'tab'   => 'ursacorelab.gallery::lang.plugin.name',
                'label' => 'ursacorelab.gallery::lang.permissions.access',
                'roles' => [UserRole::CODE_DEVELOPER, UserRole::CODE_PUBLISHER],
            ],
        ];
    }

    public function registerNavigation(): array
    {
        return [
            'gallery' => [
                'label'       => 'ursacorelab.gallery::lang.plugin.name',
                'url'         => Backend::url('UrsacoreLab/Gallery/GalleryController'),
                'icon'        => 'icon-leaf',
                'iconSvg'     => 'plugins/ursacorelab/gallery/assets/icon_ursacorelab_gallery.svg',
                'permissions' => ['ursacorelab.gallery.access'],
                'order'       => 500,

                'sideMenu' => [
                    'GalleryController' => [
                        'label'       => 'ursacorelab.gallery::lang.controller.gallery.label',
                        'url'         => Backend::url('UrsacoreLab/Gallery/GalleryController'),
                        'icon'        => 'icon-list',
                        //'iconSvg'     => 'plugins/ursacorelab/gallery/assets/icon_ursacorelab_gallery.svg',
                        'permissions' => ['ursacorelab.gallery.access'],
                        'order'       => 500,
                    ],

                    'CategoryController' => [
                        'label'       => 'ursacorelab.gallery::lang.controller.category.label',
                        'url'         => Backend::url('UrsacoreLab/Gallery/CategoryController'),
                        'icon'        => 'icon-list-ol',
                        //'iconSvg'     => 'plugins/ursacorelab/gallery/assets/icon_ursacorelab_gallery_categories.svg',
                        'permissions' => ['ursacorelab.gallery.access'],
                        'order'       => 500,
                    ],
                ],
            ],
        ];
    }
}
