<?php

return [
    'plugin' => [
        'name'        => 'Галерея',
        'description' => 'Управление галереей',
    ],

    'models' => [
        'id'            => 'ID',
        'name'          => 'Название',
        'slug'          => 'URL',
        'description'   => 'Краткое описание',
        'status'        => 'Статус',
        'images'        => 'Изображения',
        'images_count'  => 'Кол-во изображений',
        'gallery_count' => 'Кол-во галерей',
        'created_at'    => 'Создано',
        'updated_at'    => 'Обновлено',
    ],

    'controller' => [
        'gallery' => [
            'label' => 'Галерея',

            'create'   => 'Добавить галерею',
            'creating' => 'Добавление',

            'saving' => 'Сохранение',

            'update' => 'Редактирование галерею',

            'deleting' => 'Удаление',
        ],

        'category' => [
            'label' => 'Категории галереи',

            'create'   => 'Добавить категорию',
            'creating' => 'Добавление',

            'saving' => 'Сохранение',

            'update' => 'Редактирование категории галереи',

            'deleting' => 'Удаление',
        ],
    ],

    'settings' => [
        'category' => [
            'additional_parameter_show_for_list'   => 'Возвращаемый дополнительный параметр "show" для списка категорий',
            'additional_parameter_show_for_single' => 'Возвращаемый дополнительный параметр "show" для указанной категории',
        ],
        'gallery'  => [
            'additional_parameter_show_for_list'   => 'Возвращаемый дополнительный параметр "show" для списка галерей',
            'additional_parameter_show_for_single' => 'Возвращаемый дополнительный параметр "show" для указанной галереи',
        ],
    ],
];
