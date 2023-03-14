<?php

namespace UrsacoreLab\Gallery;

use Backend\Facades\Backend;
use Backend\Models\UserRole;
use System\Classes\PluginBase;
use System\Classes\PluginManager;
use UrsacoreLab\Gallery\Models\Gallery;
use UrsacoreLab\Gallery\Models\GallerySettings;

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

    public function registerSettings(): array
    {
        return [
            'value' => [
                'label'       => 'ursacorelab.gallery::lang.plugin.name',
                'description' => 'ursacorelab.gallery::lang.plugin.description',
                'category'    => 'UrsacoreLab',
                'icon'        => 'icon-cogs',
                'class'       => GallerySettings::class,
                'order'       => 500,
                'keywords'    => '',
                'permissions' => ['ursacorelab.gallery.access'],
            ],
        ];
    }

    public function boot()
    {
        if (PluginManager::instance()->hasPlugin('UrsacoreLab.Blog')) {
            $this->require[] = 'UrsacoreLab.Blog';

            \UrsacoreLab\Blog\Models\Post::extend(function ($model) {
                $model->belongsToMany['gallery'] = [
                    Gallery::class,
                    'table'    => 'ursacorelab_gallery_rel_blog_posts',
                    'key'      => 'gallery_id',
                    'otherKey' => 'post_id',
                ];
            });

            \UrsacoreLab\Blog\Controllers\PostController::extendFormFields(function ($form, $model) {
                if (! $model instanceof \UrsacoreLab\Blog\Models\Post) {
                    return;
                }

                $form->addSecondaryTabFields([
                    'gallery' => [
                        'label'    => 'ursacorelab.gallery::lang.controller.gallery.label',
                        'type'     => 'relation',
                        'span'     => 'storm',
                        'cssClass' => 'col-sm-12 col-md-12',
                    ],
                ]);
            });
        }
    }
}
