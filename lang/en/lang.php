<?php

return [
    'plugin' => [
        'name'        => 'Gallery',
        'description' => 'Gallery image management',
    ],

    'models' => [
        'id'            => 'ID',
        'name'          => 'Name',
        'slug'          => 'Slug',
        'description'   => 'Description',
        'status'        => 'Status',
        'images'        => 'Images',
        'images_count'  => 'Images count',
        'gallery_count' => 'Galleries count',
        'created_at'    => 'Created At',
        'updated_at'    => 'Updated At',
    ],

    'controller' => [
        'gallery' => [
            'label' => 'Gallery',

            'create'   => 'Create gallery',
            'creating' => 'Creating',

            'saving' => 'Saving',

            'update' => 'Update gallery',

            'deleting' => 'Deleting',
        ],

        'category' => [
            'label' => 'Gallery Category',

            'create'   => 'Create category',
            'creating' => 'Creating',

            'saving' => 'Saving',

            'update' => 'Update gallery category',

            'deleting' => 'Deleting',
        ],
    ],

    'settings' => [
        'category' => [
            'additional_parameter_show_for_list'   => 'Returned additional parameter "show" for category list',
            'additional_parameter_show_for_single' => 'Returned additional parameter "show" for single category',
        ],
        'gallery'  => [
            'additional_parameter_show_for_list'   => 'Returned additional parameter "show" for gallery list',
            'additional_parameter_show_for_single' => 'Returned additional parameter "show" for single gallery',
        ],
    ],
];
