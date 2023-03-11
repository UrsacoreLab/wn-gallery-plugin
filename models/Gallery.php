<?php

namespace UrsacoreLab\Gallery\Models;

use UrsacoreLab\StaticVars\Classes\Statuses;
use Winter\Storm\Database\Model;
use Winter\Storm\Database\Traits\Validation;

class Gallery extends Model
{
    use Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'ursacorelab_galleries';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'images',
        'status',
    ];

    /**
     * @var array Validation rules for attributes
     */
    public array $rules = [
        'name'   => 'required|string|unique:ursacorelab_galleries',
        'slug'   => 'required|string|unique:ursacorelab_galleries',
        'status' => 'integer',
    ];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [
        'name'   => 'string',
        'slug'   => 'string',
        'status' => 'integer',
    ];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public $belongsToMany = [
        'categories' => [Category::class, 'table' => 'ursacorelab_gallery_rel_categories'],
    ];

    public $attachMany = [
        'images' => ['System\Models\File', 'order' => 'sort_order'],
    ];

    public function getStatusOptions(): array
    {
        return Statuses::short_list();
    }

    public function getImagesCountAttribute()
    {
        return $this->images()->count();
    }
}
