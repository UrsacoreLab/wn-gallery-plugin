# Плагин Галерея / Gallery

Получение только активных галерей и категорий

### ***/api/gallery/categories***

Получение списка всех категорий плагина "Галерея"

```json
{
    "data": [
        {
            "name": "Category name",
            "slug": "category_slug",
            "description": ""
        }
    ],
    "type": "success",
    "show": true,
    "translate_code": "statuses.synced",
    "messages": null
}
```

### ***/api/gallery/category/{slug}***

Получение конкретной категории по URL

```json
{
    "data": {
        "name": "Category name",
        "slug": "category_slug",
        "description": ""
    },
    "type": "success",
    "show": true,
    "translate_code": "statuses.synced",
    "messages": null
}
```

### ***/api/gallery/category/{slug}?gallery***

Получение категории по URL с выводом привязанных галерей

```json
{
    "data": {
        "name": "Category name",
        "slug": "category_slug",
        "description": "",
        "galleries": [
            {
                "name": "Gallery name",
                "slug": "slug",
                "description": "",
                "images": [
                    {
                        "extension": "png/jpg/*",
                        "path": "full path to image"
                    }
                ]
            }
        ]
    },
    "type": "success",
    "show": true,
    "translate_code": "statuses.synced",
    "messages": null
}
```

### ***/api/gallery***

Получение списка галерей

```json
{
    "data": [
        {
            "name": "Gallery name",
            "slug": "slug",
            "description": "",
            "images": [
                {
                    "extension": "png/jpg/*",
                    "path": "full path to image"
                }
            ]
        }
    ],
    "type": "success",
    "show": true,
    "translate_code": "statuses.synced",
    "messages": null
}
```

### ***/api/gallery/{slug}***

Получение конкретной галереи по URL

```json
{
    "data": {
        "name": "Gallery name",
        "slug": "slug",
        "description": "",
        "images": [
            {
                "extension": "png/jpg/*",
                "path": "full path to image"
            }
        ]
    },
    "type": "success",
    "show": true,
    "translate_code": "statuses.synced",
    "messages": null
}
```

### ***/api/gallery/{slug}?categories***

Получение конкретной галереи по URL с принадлежностью к категориям

```json
{
    "data": {
        "name": "Gallery name",
        "slug": "slug",
        "description": "",
        "images": [
            {
                "extension": "png/jpg/*",
                "path": "full path to image"
            }
        ],
        "categories": [
            {
                "name": "Category name",
                "slug": "category_slug",
                "description": ""
            }
        ]
    },
    "type": "success",
    "show": true,
    "translate_code": "statuses.synced",
    "messages": null
}
```
