<?php

namespace UrsacoreLab\Gallery\Models;

use UrsacoreLab\StaticVars\Classes\Statuses;
use Winter\Storm\Database\Model;
use Winter\Storm\Database\Traits\Validation;

class Category extends Model
{
    use Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'ursacorelab_gallery_categories';

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
        'status',
    ];

    /**
     * @var array Validation rules for attributes
     */
    public array $rules = [
        'name'        => 'required|string|unique:ursacorelab_gallery_categories',
        'slug'        => 'required|string|unique:ursacorelab_gallery_categories',
        'description' => 'string',
        'status'      => 'integer',
    ];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [
        'name'        => 'string',
        'slug'        => 'string',
        'description' => 'string',
        'status'      => 'integer',
    ];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public $belongsToMany = [
        'galleries' => [Gallery::class, 'table' => 'ursacorelab_gallery_rel_categories'],
    ];

    public function getStatusOptions(): array
    {
        return Statuses::short_list();
    }

    public function getGalleryCountAttribute()
    {
        return $this->galleries()->count();
    }
}
